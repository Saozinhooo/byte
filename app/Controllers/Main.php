<?php

namespace App\Controllers;

require_once __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;
use App\Models\Package_model;
use App\Models\Post_model;
use App\Models\Comment_model;
use App\Models\Payment_model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Main extends BaseController
{
	public function index()
	{

		$packagemodel = new Package_model();
		$postmodel = new Post_model();
		$session = session();

		$data = [
			'packages' => $packagemodel
				->orderBy('packages.id', 'DESC')
				->limit(4)
				->groupBy('packages.id')
				->find(),
			'featured' => $packagemodel->where('featured', '1')->limit(8)->find(),
			'posts' => $postmodel->orderBy('id', 'DESC')->limit(8)->find(),
			'packages_blog' => $packagemodel->join('package_comments', 'packages.id = package_comments.package_id', 'left')
				->select('packages.*')
				->selectAvg('package_comments.rating')
				->orderBy('package_comments.rating', 'DESC')
				->limit(4)
				->groupBy('packages.id')
				->find(),
		];

		$ses_data = [
			'id' => $session->id,
			'logged_in' => $session->logged_in,
			'name' => $session->fname,
		];

		echo view('templates/header');
		echo view('nav', $ses_data);
		echo view('title');
		echo view('map');
		echo view('packages', $data);
		echo view('about');
		echo view('book', $data);
		echo view('templates/footer');
		//echo view('blogs', $data);
	}

	function bookConfirm()
	{
		$arrival = $this->request->getPost('arrival_date');
		$checkin = $this->request->getPost('checkin_date');
		$datediff = strtotime($arrival) - strtotime($checkin);
		$package_id = array();
		$package_data = $this->request->getPost('package_data');

		if ($package_data) {

			foreach ($package_data as $check) {
				$package_id[] = $check;
			}
		}

		$data = [
			'schedule' => $datediff,
			'pax' => $this->request->getPost('cust_qty'),
			'price' => $this->request->getPost('package_price'),
			'image' => $this->request->getPost('package_image'),
			'checkin' => $checkin,
			'arrival' => $arrival,
			'package_data' => $package_id,
			'contact_no' => $this->request->getPost('contact_no')
		];

		echo view('confirm', $data);
	}

	function savePayerDetails()
	{

		$paymentmodel = new Payment_model();
		$payer_email = $this->request->getPost('payer_email');
		$payer_contact = $this->request->getPost('contact_no');
		$packageData = $this->request->getPost('packageDetails');
		$names_included = $this->request->getPost('pax');
		$activities = $this->request->getPost('activities');
		$checkin_date = strtotime($this->request->getPost('checkin_date'));
		$checkin_date = date('Y-m-d', $checkin_date);
		$arrival_date = strtotime($this->request->getPost('arrival_date'));
		$arrival_date = date('Y-m-d', $arrival_date);
		$packageData = json_decode($packageData);
		$sid = "";
		$token = null;
		$activities = str_replace(' ', '', $activities);
		foreach ($packageData as $packageInfo) {
			$package[] = explode('+', $packageInfo);
		}
		for ($i = 0; $i < count($package); $i++) {
			unset($package[$i][4]);
		}
		$activities = implode(',', array_unique(explode(',', $activities)));
		$package['activities'] = $activities;

		$data = [
			'transaction_id' => $this->request->getPost('transaction_id'),
			'amount_paid' => $this->request->getPost('payment'),
			'customer_name' => $this->request->getPost('fullname'),
			'customer_email' => $payer_email,
			'customer_contact' => $payer_contact,
			'status' => $this->request->getPost('status'),
			'customer_id' => session()->id,
			'packageDetails' => json_encode($package),
			'checkin_date' => $checkin_date,
			'names_included' => $names_included
		];

		$body = "You order has been confirmed.";
		$body .= "<br/>Amount paid: " . $data['amount_paid'];
		$body .= "<br/>Arrival Date: " . $arrival_date;
		$body .= "<br/>Transaction ID: " . $data['transaction_id'];
		$body .= "<br/><small>Please show the transaction to the tour guide.</small>";

		$result = $paymentmodel->insert($data);

		if ($result) {
			$payer_contact = '+639661409725'; // testing only

			$twilio_number = "+13157125259";
			$twilio = new Client($sid, $token);
			$message = $twilio->messages
				->create(
					$payer_contact, // to
					array(
						"from" => "+13157125259",
						"body" => $body
					)
				);

			print($message->sid);
			$email = \Config\Services::email();
			$email->setFrom('clevermonteros9@gmail.com', 'byte@donotreply');
			$email->setTo($payer_email);
			$email->setSubject('Confirmation');
			$email->setMessage($body);

			if ($email->send()) {
				print('Email sent successfully.');
			} else {
				$error = $email->printDebugger(['headers']);
				print_r($error);
			}
		}
	}

	public function send_email_faq()
	{

		$set_from = $this->request->getPost('sender_email');
		$body = $this->request->getPost('inquiry_body');
		$email = \Config\Services::email();
		$email->setFrom($set_from, 'inquiry@byte.com');
		$email->setTo('davevincentoporto@gmail.com');
		$email->setSubject('Inquiry');
		$email->setMessage($body);

		if ($email->send()) {
			print('Email sent successfully.');
			return redirect()->to('/');
		} else {
			$error = $email->printDebugger(['headers']);
			print_r($error);
		}
	}
}
