

   <?php 

        if(isset($_GET['id'])){
    


          $id = $_GET['id'];

          $customer =  new Customers();

          $list = $customer->select($id);

          foreach ($list as $key => $db) {

            $person  = array(

              'id' => $db['id'],

              'customer_id' => $db['customer_id'],

              'fname' =>  $db['fname'],

              'lname' => $db['lname'],

              'email' => $db['email'],

              'phone' => $db['phone'],

              'address1' => $db['address1'],

              'address2'=> $db['address2'],

              'zip' => $db['zip'],

              'state' => $db['state'],

              'city' => $db['city'],

              'campany' => $db['campany'],

              'account' => $db['account'],

              'comment' => $db['comment'],

              'status' => $db['status'],

              'avatar' => $db['avatar'],

              'date_added' => $db['date_added']

            );    
              
             

          }}

   ?>

            </div>

               <div class="clearfix"></div>
               <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customer Profile</h2>
                    <form method="post" action="">

                    </form>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php

                            $avatar = $person['avatar'];


                             if(!$avatar == 0){
                                echo "<img class='img-responsive avatar-view' src='app/images/avatar/$avatar' alt='avatar'>";
                            }else{
                              echo '<img class="img-responsive avatar-view" src="app/images/avatar/user.png" alt="avatar">';
                            }


                          ?>
                        </div>
                      </div>
                      <h3><?php echo $person['fname'] .  '&nbsp'  . $person['lname'] ?></h3>

                      <ul class="list-unstyled user_data">
                      
                        <li>
                          <i class="fa fa-envelope user-profile-icon"></i> <?php echo $person['email'] ?>
                          </li>
                         
                        <li class="m-top-xs">
                          <i class="fa fa-phone user-profile-icon"></i>
                          <a> <?php echo $person['phone'] ?></a>
                        </li>

                         <li class="m-top-xs">
                          <i class="fa fa-credit-card-alt" user-profile-icon"> Balance:</i>
                          <a class="balance"> 0.00</a>
                        </li>

                      </ul>

                      <a href="customers.php?page=edit&id=<?php echo $id ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                   
                    
                   

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                   
                    

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Order History</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Payment History</a>
                          </li>

                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Customer Information</a>
                          </li>
                          
                        </ul>
                        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                <div class="x_panel">
                  <div class="x_content">
<?php
$output ="";
$output ='<table  class="table table-hover table-no-border">';
$output .='<thead>';
$output .='<tr>';
$output .='<th>Order no</th>';
$output .='<th>Quantity</th>';
$output .='<th>Amount</th>';
$output .='<th>Balance</th>';
$output .='<th>Date</th>';
$output .='<th>status</th>';
$output .='</tr>';
$output .='</thead>';
               
$query = query("SELECT * FROM sale_orders WHERE customer = '{ " . $person['customer_id'] . " }' ");

while($row = fetch_array($query)){

$output .='</tbody';
$output .="<tr>";
$output .="<th>".$row['order_id']."</th>";
$output .="<th>".$row['quantity']."</th>";
$output .="<th>".$row['amount']."</th>";
$output .="<th>".$row['balance']."</th>";
$output .="<th>".$row['date_order']."</th>";
$output .="<th>".$row['status']."</th>";
$output .="</tr>";
}

$output .='</tbody>';
$output .='</table>';
echo $output;


                   
            ?>
                  </div>
                </div>
            </div>
            <!--tab1-->

            <div role="tabpanel" class="tab-pane fade  in" id="tab_content2" aria-labelledby="home-tab">
                <div class="x_panel">
                  <div class="x_content">
                     <?php
$output ="";
$output ='<table  class="table table-hover table-no-border">';
$output .='<thead>';
$output .='<tr>';
$output .='<th>Order no</th>';
$output .='<th>Amount Due</th>';
$output .='<th>Method</th>';
$output .='<th>Check no.</th>';
$output .='<th>Date</th>';
$output .='</tr>';
$output .='</thead>';



                
// $query = query("SELECT * FROM customer_payment WHERE customer_name = '{$customer_id}' ");

// while($row = fetch_array($query)){

// $output .='</tbody';

// $output .="<tr>";
// $output .="<th>".$row['order_id']."</th>";
// $output .="<th>".$row['amount_due']."</th>";
// $output .="<th>".$row['payment_method']."</th>";
// $output .="<th>".$row['check_no']."</th>";
// $output .="<th>".$row['date_payment']."</th>";
// $output .="</tr>";



// }

// $output .='</tbody>';
// $output .='</table>';
// echo $output;


                   
            ?>
                  </div>
                </div>
            </div>
            <!--tab2-->
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">


                <div class="x_panel">

                <div class="x_content">


                <table  class="table-form">

                <tr>
                <th width="20%;">Firstname :</th>
                <th> <?php echo $person['fname'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Lastname :</th>
                <th><?php echo $person['lname'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Email :</th>
                <th><?php echo $person['email'] ?></th>
                </tr>

                

                <tr>
                <th width="20%;">Phone Number :</th>
                <th><?php echo $person['phone'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Campany Name :</th>
                <th><?php echo $person['campany'] ?></th>
                </tr>

                 <tr>
                <th width="20%;">Account Number :</th>
                <th><?php echo $person['account'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Address 1 :</th>
                <th><?php echo $person['address1'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Address 2 :</th>
                <th><?php echo $person['address2'] ?></th>
                </tr>

                <tr>
                <th width="20%;">City :</th>
                <th><?php echo $person['city'] ?></th>
                </tr>

                <tr>
                <th width="20%;">State :</th>
                <th><?php echo $person['state'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Zip :</th>
                <th><?php echo $person['zip'] ?></th>
                </tr>

                 <tr>
                <th width="20%;">Comment :</th>
                <th><?php echo $person['comment'] ?></th>
                </tr>

                 <tr>
                <th width="20%;">Status :</th>
                <th><?php echo $person['status'] ?></th>
                </tr>

                <tr>
                <th width="20%;">Date Added: :</th>
                <th><?php echo $person['date_added'] ?></th>
                </tr>

                </table>

                </div>
                </div>

                </div>
                   <!--tab3-->     
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>