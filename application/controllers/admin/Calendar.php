<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{


    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        is_logged_in();
        $this->load->model('admin/fullcalendar_model');
        $this->load->model('admin/user_model');
    }

    public function index()
    {
        $data['title'] = 'Baiti Jannati | Calendar';
        $data['user'] = $this->user_model->showUser($this->session->userdata('id_user'));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/calendar/index', $data);
        $this->load->view('templates/footer_calendar');
        $this->load->view('templates/footer_dark');
    }

    public function load()
    {
        $event_data = $this->fullcalendar_model->fetch_all_event();
        foreach ($event_data->result_array() as $row) {
            $data[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'start' => $row['start_event'],
                'end' => $row['end_event']
            );
        }
        echo json_encode($data);
    }

    function insert()
    {
        if ($this->input->post('title')) {
            $data = array(
                'title'  => $this->input->post('title'),
                'start_event' => $this->input->post('start'),
                'end_event' => $this->input->post('end')
            );
            $this->fullcalendar_model->insert_event($data);
        }
    }

    function update()
    {
        if ($this->input->post('id')) {
            $data = array(
                'title'   => $this->input->post('title'),
                'start_event' => $this->input->post('start'),
                'end_event'  => $this->input->post('end')
            );

            $this->fullcalendar_model->update_event($data, $this->input->post('id'));
        }
    }

    function delete()
    {
        if ($this->input->post('id')) {
            $this->fullcalendar_model->delete_event($this->input->post('id'));
        }
    }
}