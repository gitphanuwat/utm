<!-- Small boxes (Stat box) -->
                    <div class="row">
                    
                    <?php
							$sql="select count(*) from tb_user";
							$result=mysqli_query($connect,$sql);
							$row=mysqli_fetch_array($result);
							$itemNum=$row[0];
							echo " <div class='col-lg-3 col-xs-6'>";
                            	echo "<div class='small-box bg-yellow'>";
                                	echo "<div class='inner'>";
                                    	echo "<h3>";
                                        	echo $itemNum;
                                    	echo "</h3>";
                                    	echo "<p>";
                                        	echo "เกษตรกร";
                                    	echo "</p>";
                                	echo "</div>";
                                	echo "<div class='icon'>";
                                    	echo "<i class='ion ion-person-add'></i>";
                                	echo "</div>";
                                	echo "<a href='stat_farmer.php' class='small-box-footer'>";
                                    	echo "More info <i class='fa fa-arrow-circle-right'></i>";
                                	echo "</a>";
                            	echo "</div>";
                        	echo "</div><!-- ./col -->";

							$sql="select count(*) from tb_year";
							$result=mysqli_query($connect,$sql);
							$row=mysqli_fetch_array($result);
							$itemNum=$row[0];
							echo " <div class='col-lg-3 col-xs-6'>";
                            	echo "<div class='small-box bg-aqua'>";
                                	echo "<div class='inner'>";
                                    	echo "<h3>";
                                        	echo $itemNum;
                                    	echo "</h3>";
                                    	echo "<p>";
                                        	echo "ปีสำรวจข้อมูล";
                                    	echo "</p>";
                                	echo "</div>";
                                	echo "<div class='icon'>";
                                    	echo "<i class='ion ion-ios7-alarm-outline'></i>";
                                	echo "</div>";
                                	echo "<a href='stat_durian.php' class='small-box-footer'>";
                                    	echo "More info <i class='fa fa-arrow-circle-right'></i>";
                                	echo "</a>";
                            	echo "</div>";
                        	echo "</div><!-- ./col -->";
							
							
							echo " <div class='col-lg-3 col-xs-6'>";
                            	echo "<div class='small-box bg-red'>";
                                	echo "<div class='inner'>";
                                    	echo "<h3>";
                                        	echo $itemNum;
                                    	echo "</h3>";
                                    	echo "<p>";
                                        	echo "Report";
                                    	echo "</p>";
                                	echo "</div>";
                                	echo "<div class='icon'>";
                                    	echo "<i class='ion ion-pie-graph'></i>";
                                	echo "</div>";
                                	echo "<a href='statistics.php' class='small-box-footer'>";
                                    	echo "More info <i class='fa fa-arrow-circle-right'></i>";
                                	echo "</a>";
                            	echo "</div>";
                        	echo "</div><!-- ./col -->";
							
							echo " <div class='col-lg-3 col-xs-6'>";
                            	echo "<div class='small-box bg-green'>";
                                	echo "<div class='inner'>";
                                    	echo "<h3>";
                                        	echo "0 <sup style='font-size: 20px'>%</sup>";
                                    	echo "</h3>";
                                    	echo "<p>";
                                        	echo "สถิติการเข้าใช้งาน";
                                    	echo "</p>";
                                	echo "</div>";
                                	echo "<div class='icon'>";
                                    	echo "<i class='ion ion-stats-bars'></i>";
                                	echo "</div>";
                                	echo "<a href='visit.php' class='small-box-footer'>";
                                    	echo "More info <i class='fa fa-arrow-circle-right'></i>";
                                	echo "</a>";
                            	echo "</div>";
                        	echo "</div><!-- ./col -->";							
							
							
					?>
                    </div><!-- /.row -->