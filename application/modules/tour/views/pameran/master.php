<div class="row">
  <div class="col-xs-12">
    <div class="box box-solid box-primary">
        <div class="box-header">
            <h3 class="box-title">Table Report</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                <a href='<?php print site_url("tour/pameran/add-new")?>' class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i></a>
            </div>
        </div>
        <div class="box-body">
          <div class="row">
<!--            <div class="box">
              <div class="box-body table-responsive">
                <table class="table table-bordered table-hover">
                  <tr>
                    <td>Tour Code</td>
                    <td><?php print $info->tour->code?></td>
                    <td>Tour Name</td>
                    <td><?php print $info->tour->title?></td>
                  </tr>
                  <tr>
                    <td>Tour Schedule Code</td>
                    <td><?php print $info->information->code?></td>
                    <td>Tour Schedule</td>
                    <td><?php print $info->information->start_date?> sd <?php print $info->information->end_date?></td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td><?php print $this->form_eksternal->form_dropdown("status", array(1 => '- All -', 2 => 'Deposit', 3 => 'Lunas', 4 => 'Deposit & Lunas', 5 => 'Book'), array($stat), "id='cari-status'")?></td>
                  </tr>
                  <tr>
                    <td><a href='<?php print site_url("tour/room-list/{$info->information->code}")?>'>Room List</a></td>
                    <td><a href='<?php print site_url("tour/password-list/{$info->information->code}")?>'>Password List</a></td>
                    <td><a href='<?php print site_url("tour/tour-leader/{$info->information->code}")?>'>Tour Leader</a></td>
                    <td><a href='<?php print site_url("tour/list-tour-book/{$info->information->code}")?>'>Tour Book List</a></td>
                  </tr>
                </table>
              </div>
            </div>-->
            <div class="box">
              <div class="box-body table-responsive">
                <table class="table table-bordered table-hover" id="tableboxy">
                  <thead>
                    <tr>
                      <th>Start</th>
                      <th>End</th>
                      <th>Title</th>
                      <th>Location</th>
                      <th>Agent</th>
                      <th>Status</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody id="data_list">
                    <?php
	                    $sts = array(1 => "<span class='label label-success'>Active</span>", 2 => "<span class='label label-warning'>Non-Active</span>");
                   
                    foreach($data AS $dt){
                      print "<tr>"
                        . "<td>{$dt->date_start}</td>"
                        . "<td>{$dt->date_end}</td>"
                        . "<td><a href='".site_url("tour/pameran/report-book/".$dt->id_tour_pameran)."'>{$dt->title}</a></td>"
                        . "<td>{$dt->location}</td>"
                        . "<td>{$dt->jml}</td>"
                        . "<td>{$sts[$dt->status]}</td>"
                        . "<td>"
                          . "<div class='btn-group'>"
                            . "<button data-toggle='dropdown' class='btn btn-small dropdown-toggle'>Action<span class='caret'></span></button>"
                            . "<ul class='dropdown-menu'>"
                              . "<li><a href='".site_url("tour/pameran/add-new/".$dt->id_tour_pameran)."'>Edit</a></li>"
                              . "<li><a href='".site_url("tour/pameran/list-users/".$dt->id_tour_pameran)."'>Management Users</a></li>"
                              . "<li><a href='".site_url("tour/pameran/report-book/".$dt->id_tour_pameran)."'>Book Report</a></li>"
                            . "</ul>"
                          . "</div>"
                        . "</td>"
                      . "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>  
        </div>
    </div>
  </div>
</div>
