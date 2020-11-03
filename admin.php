<?php include ('adminhead.php'); ?>



</header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-10">
	<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Course List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Course</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      
      <table class="table table-bordered table-striped table-condensed">
                              <thead>

<tr>
                                  <th>No</th>
                                  <th>Course code</th>
                                  <th>Course title</th>
                                  <th>Level</th>
                       			   <th>Unit</th>
                                  <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
<tr>
<td>1</td>
<td>Intro. to Computer</td>
<td>COM 111</td>
<td>100</td>
<td>3</td>
<td> 
                                                          
   <div class="btn-group">
                                        <button class="btn btn-primary">Action</button>
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Edit</a></li>
                                            <li><a href="#">Delete</a></li>
                       
                                        </ul>
                                  </td>
                                  </tr>
                              </tbody>
                          </table>
    </div>
    <div id="add" class="tab-pane fade">
    <hr>
 
<form class="form-horizontal" method="post">
<div class="form-group">
<label class="control-label col-lg-2">Course Code:</label>
<div class="col-lg-4">
<input type="text" class="form-control" name="ccode">
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Course Title:</label>
<div class="col-lg-4">
<input type="text" class="form-control" name="ctitle">
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Course Code:</label>
<div class="col-lg-4">
<select class="form-control" name="level">
<option value="100">100</option>
<option value="100">100</option>
<option value="100">100</option>
<option value="100">100</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Course Unit:</label>
<div class="col-lg-4">
<select class="form-control" name="cunit">
<option value="100">100</option>
<option value="100">100</option>
<option value="100">100</option>
<option value="100">100</option>
</select>
</div>
</div>
<div class="form-group">
<div class=" col-xs-offset-2  col-lg-4">
<button class="btn btn-info" type="submit" name="submit">Submit</button>
<button class="btn btn-warning" type="reset" >Clear</button>
</div>
</div>



</form>
    </div>

  </div>



</section>



<?php include ('footer.php');?>