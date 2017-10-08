<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

Class Library extends CI_Controller
    {

    /**
     * This controller is using for control library
     *
     * Maps to the following URL
     * 		http://example.com/index.php?module=library
     * 	- or -  
     * 		http://example.com/index.php?module=library&view=<method_name>
     */
    public function __construct()
        {
        parent::__construct();
        $this->lang->load('auth');
        $this->load->model('librarymodel');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        }

    //This function is using to add books category and sub-category for library.
    public function addBookCategory()
        {
        if ($this->input->post('submit',TRUE)) {
            $user = $this->ion_auth->user()->row();
            $data_insert = array(
                'category_title' => $this->db->escape_like_str($this->input->post('category',TRUE)),
                'description' => $this->db->escape_like_str($this->input->post('description',TRUE)),
                'parent_category' => $this->db->escape_like_str($this->input->post('parent_category',TRUE)),
                'category_creator' => $this->db->escape_like_str($user->username)
            );
            $result = $this->db->insert('books_category', $data_insert);
            if ($result) {
                $data['category'] = $this->common->getAllData('books_category');
                $this->load->view('temp/header');
                $this->load->view('allBooksCategory', $data);
                $this->load->view('temp/footer');
            }
        } else {
            $data['category'] = $this->common->getAllData('books_category');
            $this->load->view('temp/header');
            $this->load->view('addBookCategory', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function is showing all books category and sub category 
    public function allBooksCategory()
        {
        $data['category'] = $this->common->getAllData('books_category');
        $this->load->view('temp/header');
        $this->load->view('allBooksCategory', $data);
        $this->load->view('temp/footer');
        }

    //This function is edit and update the category informations.
    public function editCategory()
        {
        $id = $this->input->get('id');
        if ($this->input->post('submit',TRUE)) {
            $category = $this->input->post('category',TRUE);
            $description = $this->input->post('description',TRUE);
            $parentCategory = $this->input->post('parent_category',TRUE);

            $editData = array(
                'category_title' => $this->db->escape_like_str($category),
                'description' => $this->db->escape_like_str($description),
                'parent_category' => $this->db->escape_like_str($parentCategory)
            );

            $this->db->where('id', $id);
            if ($this->db->update('books_category', $editData)) {
                redirect('module=library&view=allBooksCategory', 'refresh');
            }
        } else {
            $data['category'] = $this->common->getAllData('books_category');
            $data['books'] = $this->common->getWhere('books_category', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editCategory', $data);
            $this->load->view('temp/footer');
        }
        }

    //THis function is using to delete books category
    public function deleteCategory()
        {
        $id = $this->input->get('id');
        if ($this->db->delete('books_category', array('id' => $id))) {
            redirect('module=library&view=allBooksCategory', 'refresh');
        }
        }

    //This function will add books with books category.
    public function addBook()
        {
        if ($this->input->post('submit',TRUE)) {
            $user = $this->ion_auth->user()->row();
            $booksAmount = $this->librarymodel->booksAmount();
            $dataInsert = array(
                'books_title' => $this->db->escape_like_str($this->input->post('bookTitle',TRUE)),
                'authore' => $this->db->escape_like_str($this->input->post('bookAuthor',TRUE)),
                'edition' => $this->db->escape_like_str($this->input->post('bookEdition',TRUE)),
                'books_amount' => $this->db->escape_like_str($booksAmount),
                'description' => $this->db->escape_like_str($this->input->post('description',TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('booksCategory',TRUE)),
                'pages' => $this->db->escape_like_str($this->input->post('pages',TRUE)),
                'uploderTitle' => $this->db->escape_like_str($user->username)
            );
            if ($this->db->insert('books', $dataInsert)) {
                redirect('module=library&view=allBook', 'refresh');
            }
        } else {
            //First time load the view for add book to library.
            $data['category'] = $this->common->getAllData('books_category');
            $this->load->view('temp/header');
            $this->load->view('addBook', $data);
            $this->load->view('temp/footer');
        }
        }

    //This function load all books in this system.
    public function allBook()
        {
        $data['allBook'] = $this->common->getAllData('books');
        $data['category'] = $this->common->getAllData('books_category');
        $this->load->view('temp/header');
        $this->load->view('allBook', $data);
        $this->load->view('temp/footer');
        }

    //This function will Update the books information which was submited previously.
    public function editBook()
        {
        $id = $this->input->get('id');
        if ($this->input->post('submit',TRUE)) {

            $user = $this->ion_auth->user()->row();
            $booksAmount = $this->librarymodel->booksAmount();
            $dataUpdate = array(
                'books_title' => $this->db->escape_like_str($this->input->post('bookTitle',TRUE)),
                'authore' => $this->db->escape_like_str($this->input->post('bookAuthor',TRUE)),
                'edition' => $this->db->escape_like_str($this->input->post('bookEdition',TRUE)),
                'books_amount' => $this->db->escape_like_str($booksAmount),
                'description' => $this->db->escape_like_str($this->input->post('description',TRUE)),
                'category' => $this->db->escape_like_str($this->input->post('booksCategory',TRUE)),
                'pages' => $this->db->escape_like_str($this->input->post('pages',TRUE)),
                'uploderTitle' => $this->db->escape_like_str($user->username)
            );
            $this->db->where('id', $id);
            if ($this->db->update('books', $dataUpdate)) {
                redirect('module=library&view=allBook', 'refresh');
            }
        } else {
            //First time load the view for add book to library.
            $data['category'] = $this->common->getAllData('books_category');
            $data['Book'] = $this->common->getWhere('books', 'id', $id);
            $this->load->view('temp/header');
            $this->load->view('editBooks', $data);
            $this->load->view('temp/footer');
        }
        }

    //THis function is using to delete the books
    public function deleteBook()
        {
        $id = $this->input->get('id');
        if ($this->db->delete('books', array('id' => $id))) {
            redirect('module=library&view=allBook', 'refresh');
        }
        }

    }
