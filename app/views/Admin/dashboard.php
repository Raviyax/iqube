<?php $this->view('inc/header',$data); ?>
<link rel="stylesheet" href="<?php echo URLROOT;?>/assets/css/Admin/dashboard.css">
    <div class="container">
        <!-- start of sidebar -->
        <?php $this->view('inc/sidebar'); ?>  
        <!-- end of sidebar -->

        <!-- start of main part -->
        <div id="main" class="main">
            <!-- start of navbar -->
            <?php $this->view('inc/navbar',$data); ?> 

            <!-- end of navbar -->

            <!-- start of content -->
            
            <div class="main-content">
        
            
                
                
                <main>
                    
                 
                    
                    <div class="page-content">
                    
                        <div class="analytics">
        
                            <div class="card">
                                <div class="card-head">
                                    <h2>107,200</h2>
                                    <span class="las la-user-friends"></span>
                                </div>
                                <div class="card-progress">
                                    <small>Total purchases this month</small>
                                    <div class="card-indicator">
                                        <div class="indicator one" style="width: 60%"></div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="card">
                                <div class="card-head">
                                    <h2>340,230</h2>
                                    <span class="las la-eye"></span>
                                </div>
                                <div class="card-progress">
                                    <small>Total Students</small>
                                    <div class="card-indicator">
                                        <div class="indicator two" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="card">
                                <div class="card-head">
                                    <h2>Rs.653,200</h2>
                                    <span class="las la-shopping-cart"></span>
                                </div>
                                <div class="card-progress">
                                    <small>Total Revenue</small>
                                    <div class="card-indicator">
                                        <div class="indicator three" style="width: 65%"></div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="card">
                                <div class="card-head">
                                    <h2>47,500</h2>
                                    <span class="las la-envelope"></span>
                                </div>
                                <div class="card-progress">
                                    <small>Total Tutors</small>
                                    <div class="card-indicator">
                                        <div class="indicator four" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
        
        
                        <div class="records table-responsive">
        
                            <div class="record-header">
                                <div class="add">
                                    <span>Recent Payments</span>
                                    
                                </div>
        
                                <div class="browse">
                                   <input type="search" placeholder="Search" class="record-search">
                                    <select name="" id="">
                                        <option value="">Status</option>
                                    </select>
                                </div>
                            </div>
        
                            <div>
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th><span class="las la-sort"></span> Student Name</th>
                                            <th><span class="las la-sort"></span> Amount</th>
                                            <th><span class="las la-sort"></span> Payment Date</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Andrew Bruno</h4>
                                                        <small>bruno@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $3171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                           
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Exty Bruno</h4>
                                                        <small>exty@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $3171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                           
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Exty Bruno</h4>
                                                        <small>exty@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $2171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                           
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Andrew Bruno</h4>
                                                        <small>bruno@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $3171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                           
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Exty Bruno</h4>
                                                        <small>exty@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $3171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                            <td>
                                                <span class="paid">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Exty Bruno</h4>
                                                        <small>exty@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $2171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                            <td>
                                                <span class="paid">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/3.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Andrew Bruno</h4>
                                                        <small>bruno@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $3171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                            <td>
                                                -$205
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Exty Bruno</h4>
                                                        <small>exty@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $3171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                            <td>
                                                -$205
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#5033</td>
                                            <td>
                                                <div class="client">
                                                   <div class="client-img bg-img" style="background-image: url(img/1.jpeg)"></div>
                                                    <div class="client-info">
                                                        <h4>Exty Bruno</h4>
                                                        <small>exty@crossover.org</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                $2171
                                            </td>
                                            <td>
                                                19 April, 2022
                                            </td>
                                            <td>
                                                <span class="paid">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <span class="lab la-telegram-plane"></span>
                                                    <span class="las la-eye"></span>
                                                    <span class="las la-ellipsis-v"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
        
                        </div>
                    
                    </div>
                    
                </main>
                
            </div>

    <!-- ================End of content ================= -->

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <?php $this->view('inc/footer'); ?>


