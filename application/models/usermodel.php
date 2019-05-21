<?php
class usermodel extends CI_Model {

	function can_login($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('students');

		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function register($data)
        {

                $data = array(
                        'firstName' => $this->input->post('studentfName'),
                        'lastName' => $this->input->post('studentlName'),
                        'email' => $this->input->post('studentEmail'),
                        'password' => $this->input->post('pass'),
                        'age' => $this->input->post('age'),
                        'course' => $this->input->post('course'),
                        'studentGender' => $this->input->post('gender')
                );

                $this->db->insert('students', $data);
        }



public function getStud()
			{
				$this->db->where('email','qwe@gmail.com');
				$query = $this->db->get('students');

				if($query->num_rows() > 0)
				{
					return $query->result();
				}
}
public function getTeacher()
			{
				$this->db->where('email','qwe@gmail.com');
				$query = $this->db->get('teacher');

				if($query->num_rows() > 0)
				{
					return $query->result();
				}
}

public function getSubj()
			{
				//$this->db->where('email',$_SESSION['email']);
				$query = $this->db->get('subject');

				if($query->num_rows() > 0)
				{
					return $query->result();
				}
			}
			public function getRoom($room)
						{
							$this->db->where('roomID',$room);
							$query = $this->db->get('room');

							if($query->num_rows() > 0)
							{
								return $query->result();
							}
						}
						public function getTeacherID()
									{

											$this->db->where('email','qwe@gmail.com');
											$query = $this->db->get('teacher');

											if($query->num_rows() > 0)
											{
												foreach($query->result() as $one){
													return $one->teachersID;
												}
											}
									}

			public function getInfo()
						{
							//$this->db->where('email',$_SESSION['email']);

							$one = $this->getStud();
							foreach($one as $data){
							$this->db->select('*');
							$this->db->from('subjectschedule');
							$this->db->join('subject','subjectschedule.subjectid=subject.subjectID');
							$this->db->join('teacher','subjectschedule.teacherid=teacher.teachersID');
							$this->db->where('subject.courseType',$data->course);
							$query = $this->db->get();
						}
							if($query->num_rows() > 0)
							{
								return $query->result();
							}
					}
					public function teacher_getInfo(){
						$one = $this->getTeacher();
						foreach($one as $data){

						$this->db->select('*');
						$this->db->from('subjectschedule');
						$this->db->join('subject','subjectschedule.subjectid=subject.subjectID');
						$this->db->join('teacher','subjectschedule.teacherid=teacher.teachersID');
						$this->db->where('teacher.teachersID',$data->teachersID);
						$query = $this->db->get();
						print_r($data->teachersID);





					if($query->num_rows() > 0)
					{
						return $query->result();
					}
				}

					}

					public function teacher_register($data)
								{

												$data = array(
																'fNAme' => $this->input->post('studentfName'),
																'lNAme' => $this->input->post('studentlName'),
																'email' => $this->input->post('studentEmail'),
																'password' => $this->input->post('pass'),
																'age' => $this->input->post('age'),
																'courseType' => $this->input->post('course'),
																'gender' => $this->input->post('gender')
												);

												$this->db->insert('teacher', $data);
								}
								public function makeclass(){



									$data = array(

													'subjectCode' => $this->input->post('subjectCode'),
													'subjectName' => $this->input->post('subjectName'),
													'units' => $this->input->post('units'),
													'courseType' => $this->input->post('course'),

									);

									$this->db->insert('subject', $data);

									$subCode = $this->getSubjID($_POST['subjectCode']);
									$teacher = $this->getTeacherID();

																	$data2 = array(
																					'roomid' => $this->input->post('room'),
																					'subjectID' =>$subCode,
																					'teacherID' => $teacher,
																					'time_start' => $this->input->post('time_start'),
																					'time_end' => $this->input->post('time_end'),
																					'day' => $this->input->post('day'),
																					'semester' => $this->input->post('semester'),
																					'academic_year_start' => $this->input->post('aca_start'),
																					'academic_year_end' => $this->input->post('aca_end'),
																	);
																		$this->db->insert('subjectschedule', $data2);
								}


								public function getSubjID($code)
											{
												$this->db->where('subjectCode',$code);
												$query = $this->db->get('subject');

												if($query->num_rows() > 0)
												{
													foreach($query->result() as $one){
														return $one->subjectID;
													}
												}
											}

}
