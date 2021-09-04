<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
  public function __construct() {
      parent::__construct();
      $this->load->helper('form');
      $this->load->library('form_validation');
    }
  public function login() {

    $auth = HttpRequest([
      'url' => 'https://reqres.in/api/login', 
      'method' => 'post', 
      'params' => [
        "email" => ".hols.in",
        "password" => "cityska"
      ]
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('layouts/auth', [
        'title' => 'Login',
        'page' => 'auth/login',
      ]);
    }
    else
    {
      redirect(base_url('1/chat/2'));
    }
    
  }
  public function register() {
    $auth = HttpRequest([
      'url' => 'https://reqres.in/api/register', 
      'method' => 'post', 
      'params' => [
        "email" => "eve.holt@reqres.in",
        "password" => "pistol"
      ]
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('layouts/auth', [
        'title' => 'Register',
        'page' => 'auth/register',
      ]);
    }
    else
    {
      redirect(base_url('1/chat/2'));
    }
  }
	public function showLoginForm()
	{
		$this->load->view('layouts/auth', [
      'title' => 'Login',
      'page' => 'auth/login'
    ]);
	}
  public function showRegisterForm()
	{
		$this->load->view('layouts/auth', [
      'title' => 'Register',
      'page' => 'auth/register'
    ]);
	}
}
