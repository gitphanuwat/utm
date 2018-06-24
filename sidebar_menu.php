<?php
//////////////memu for Admin
	if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>หน้าหลัก</span>";
            echo "</a>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="system"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='fa fa-laptop'></i>";
                echo "<span>จัดการข้อมูลระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="type"){
					echo " class='active'";
				}
				echo "><a href='cf_type.php'><i class='fa fa-angle-double-right'></i> พันธุ์สับปะรด</a></li>";
							echo "<li";
				if($subpageName=="year"){
					echo " class='active'";
				}
				echo "><a href='cf_year.php'><i class='fa fa-angle-double-right'></i> ปีผลผลิต</a></li>";
				echo "<li";
				if($subpageName=="amphur"){
					echo " class='active'";
				}
				echo "><a href='cf_amphur.php'><i class='fa fa-angle-double-right'></i> อำเภอ</a></li>";
				echo "<li";
				if($subpageName=="tambon"){
					echo " class='active'";
				}
				echo "><a href='cf_tambon.php'><i class='fa fa-angle-double-right'></i> ตำบล</a></li>";

				echo "<li";
				if($subpageName=="moo"){
					echo " class='active'";
				}
				echo "><a href='cf_moo.php'><i class='fa fa-angle-double-right'></i> หมู่บ้าน</a></li>";

				echo "<li";
				if($subpageName=="cfgroup"){
					echo " class='active'";
				}
				echo "><a href='cfgroup.php'><i class='fa fa-angle-double-right'></i> กลุ่มเกษตรกร</a></li>";

            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="config"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-list-alt'></i>";
                echo "<span>จัดการข้อมูลเกษตรกร</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="member"){
					echo " class='active'";
				}
				echo "><a href='adminMember.php'><i class='fa fa-angle-double-right'></i> ข้อมูลเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="plot"){
					echo " class='active'";
				}
				echo "><a href='adminplot.php'><i class='fa fa-angle-double-right'></i> พื้นที่การเกษตร</a></li>";
				echo "<li";
				if($subpageName=="quality"){
					echo " class='active'";
				}
				echo "><a href='quality.php'><i class='fa fa-angle-double-right'></i> คุณภาพสินค้า</a></li>";

            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="Memberyear"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-suitcase'></i>";
                echo "<span>จัดการข้อมูลผลผลิต</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
					$sql="select idyear , nameyear , status from tb_year order by idyear desc";
					$result=mysqli_query($connect,$sql);
					while($row=mysqli_fetch_array($result)){
						echo "<li";
						if($subpageName=="year$row[0]"){
							echo " class='active'";
						}

						if($row[2]==1){
							//$u=randomText(350);
							$hrefURL="product.php?year=$row[0]";
							$lbl="<small class='badge pull-right bg-green'>open</small>";
						}else{
							$hrefURL="#";
							$lbl="<small class='badge pull-right bg-yellow'>close</small>";
						}
						echo "><a href='$hrefURL'><i class='fa fa-angle-double-right'></i> ปี $row[1] $lbl</a></li>";
					}
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="poll"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-stats'></i>";
                echo "<span>แบบสำรวจข้อมูล</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="polledit"){
					echo " class='active'";
				}
				echo "><a href='cf_poll.php'><i class='fa fa-angle-double-right'></i> จัดการแบบสำรวจ</a></li>";

				echo "<li";
				if($subpageName=="pollreport"){
					echo " class='active'";
				}
				echo "><a href='pollreport.php'><i class='fa fa-angle-double-right'></i> สรุปข้อมูลแบบสำรวจ</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="stat"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-stats'></i>";
                echo "<span>วิเคราห์ระบบสารสนเทศ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";

				echo "<li";
				if($subpageName=="farmer"){
					echo " class='active'";
				}
				echo "><a href='stat_farmer.php'><i class='fa fa-angle-double-right'></i> สถิติเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="product"){
					echo " class='active'";
				}
				echo "><a href='stat_product.php'><i class='fa fa-angle-double-right'></i> สรุปผลผลิตการเกษตร</a></li>";

				echo "<li";
				if($subpageName=="ability"){
					echo " class='active'";
				}
				echo "><a href='stat_ability.php'><i class='fa fa-angle-double-right'></i> ศักยภาพในการผลิต</a></li>";
            echo "</ul>";
        echo "</li>";
		echo "<li class='treeview";
		if($pageName=="report"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-list'></i>";
                echo "<span>สรุปรายงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="amphur"){
					echo " class='active'";
				}
				echo "><a href='rep_amphur.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามอำเภอ</a></li>";

				echo "<li";
				if($subpageName=="tambon"){
					echo " class='active'";
				}
				echo "><a href='rep_tambon.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามตำบล</a></li>";

				echo "<li";
				if($subpageName=="moo"){
					echo " class='active'";
				}
				echo "><a href='rep_moo.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามหมู่บ้าน</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="news"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-file'></i>";
                echo "<span>จัดการข่าวสารระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="News"){
					echo " class='active'";
				}
				echo "><a href='adminNews.php'><i class='fa fa-angle-double-right'></i> ข้อมูลข่าวสาร</a></li>";
            echo "</ul>";
        echo "</li>";


		echo "<li class='treeview";
		if($pageName=="tag"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-file'></i>";
                echo "<span>จัดการข้อมูลการขาย</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="gentag"){
					echo " class='active'";
				}
				echo ">";
				echo "<a href='qrmng.php'><i class='fa fa-angle-double-right'></i> จัดการ QR Code</a>";
				echo "</li>";
            echo "</ul>";
        echo "</li>";
				echo "<li>";
						echo "<a href='signout.php'>";
				echo "<i class='glyphicon glyphicon-log-out'></i>";
									echo "ออกจากระบบ";
							echo "</a>";
				echo "</li>";

	}

//////////////memu for Manager
	if($_SESSION["DUR_USER_STATE"]=="MANAGER"){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>หน้าหลัก</span>";
            echo "</a>";
        echo "</li>";


		echo "<li class='treeview";
		if($pageName=="config"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-list-alt'></i>";
                echo "<span>จัดการข้อมูลเกษตรกร</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="member"){
					echo " class='active'";
				}
				echo "><a href='adminMember.php'><i class='fa fa-angle-double-right'></i> ข้อมูลเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="plot"){
					echo " class='active'";
				}
				echo "><a href='adminplot.php'><i class='fa fa-angle-double-right'></i> พื้นที่การเกษตร</a></li>";
				echo "<li";
				if($subpageName=="quality"){
					echo " class='active'";
				}
				echo "><a href='quality.php'><i class='fa fa-angle-double-right'></i> คุณภาพสินค้า</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="Memberyear"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-suitcase'></i>";
                echo "<span>จัดการข้อมูลผลผลิต</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
					$sql="select idyear , nameyear , status from tb_year order by idyear desc";
					$result=mysqli_query($connect,$sql);
					while($row=mysqli_fetch_array($result)){
						echo "<li";
						if($subpageName=="year$row[0]"){
							echo " class='active'";
						}

						if($row[2]==1){
							//$u=randomText(350);
							$hrefURL="product.php?year=$row[0]";
							$lbl="<small class='badge pull-right bg-green'>open</small>";
						}else{
							$hrefURL="#";
							$lbl="<small class='badge pull-right bg-yellow'>close</small>";
						}
						echo "><a href='$hrefURL'><i class='fa fa-angle-double-right'></i> ปี $row[1] $lbl</a></li>";
					}
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="stat"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-stats'></i>";
                echo "<span>วิเคราห์ระบบสารสนเทศ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";

				echo "<li";
				if($subpageName=="farmer"){
					echo " class='active'";
				}
				echo "><a href='stat_farmer.php'><i class='fa fa-angle-double-right'></i> สถิติเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="product"){
					echo " class='active'";
				}
				echo "><a href='stat_product.php'><i class='fa fa-angle-double-right'></i> สรุปผลผลิตการเกษตร</a></li>";

				echo "<li";
				if($subpageName=="ability"){
					echo " class='active'";
				}
				echo "><a href='stat_ability.php'><i class='fa fa-angle-double-right'></i> ศักยภาพในการผลิต</a></li>";
            echo "</ul>";
        echo "</li>";
		echo "<li class='treeview";
		if($pageName=="report"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-list'></i>";
                echo "<span>สรุปรายงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="amphur"){
					echo " class='active'";
				}
				echo "><a href='rep_amphur.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามอำเภอ</a></li>";

				echo "<li";
				if($subpageName=="tambon"){
					echo " class='active'";
				}
				echo "><a href='rep_tambon.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามตำบล</a></li>";

				echo "<li";
				if($subpageName=="moo"){
					echo " class='active'";
				}
				echo "><a href='rep_moo.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามหมู่บ้าน</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="news"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-file'></i>";
                echo "<span>จัดการข่าวสารระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="News"){
					echo " class='active'";
				}
				echo "><a href='adminNews.php'><i class='fa fa-angle-double-right'></i> ข้อมูลข่าวสาร</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="tag"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-file'></i>";
                echo "<span>จัดการข้อมูลการขาย</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="gentag"){
					echo " class='active'";
				}
				echo ">";
				echo "<a href='qrmng.php'><i class='fa fa-angle-double-right'></i> จัดการ QR Code</a>";
				echo "</li>";
            echo "</ul>";
        echo "</li>";
				echo "<li>";
						echo "<a href='signout.php'>";
				echo "<i class='glyphicon glyphicon-log-out'></i>";
									echo "ออกจากระบบ";
							echo "</a>";
				echo "</li>";


	}


//////////////memu for User
	if($_SESSION["DUR_USER_STATE"]=="USER"){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>หน้าหลัก</span>";
            echo "</a>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="config"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-list-alt'></i>";
                echo "<span>จัดการข้อมูลเกษตรกร</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="member"){
					echo " class='active'";
				}
				echo "><a href='adminMember.php'><i class='fa fa-angle-double-right'></i> ข้อมูลเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="plot"){
					echo " class='active'";
				}
				echo "><a href='adminplot.php'><i class='fa fa-angle-double-right'></i> พื้นที่การเกษตร</a></li>";
				echo "<li";
				if($subpageName=="quality"){
					echo " class='active'";
				}
				echo "><a href='quality.php'><i class='fa fa-angle-double-right'></i> คุณภาพสินค้า</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="Memberyear"){
			echo " active";
		}
		echo "'>";
			echo "<a href='#'>";
            	echo "<i class='fa fa-suitcase'></i>";
                echo "<span>บันทึกผลผลิตสับปะรด</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
			echo "<ul class='treeview-menu'>";
					$sql="select idyear , nameyear , status from tb_year order by idyear desc";
					$result=mysqli_query($connect,$sql);
					while($row=mysqli_fetch_array($result)){
						echo "<li";
						if($subpageName=="year$row[0]"){
							echo " class='active'";
						}

						if($row[2]==1){
							//$u=randomText(350);
							$hrefURL="product.php?year=$row[0]";
							$lbl="<small class='badge pull-right bg-green'>open</small>";
						}else{
							$hrefURL="#";
							$lbl="<small class='badge pull-right bg-yellow'>close</small>";
						}
						echo "><a href='$hrefURL'><i class='fa fa-angle-double-right'></i> ปี $row[1] $lbl</a></li>";
					}
			echo "</ul>";
		echo "</li>";

		echo "<li class='treeview";
		if($pageName=="stat"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-stats'></i>";
                echo "<span>ระบบสารสนเทศ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="farmer"){
					echo " class='active'";
				}
				echo "><a href='stat_farmer.php'><i class='fa fa-angle-double-right'></i> สถิติเกษตรกร</a></li>";
        echo "<li";
				if($subpageName=="product"){
					echo " class='active'";
				}
				echo "><a href='stat_product.php'><i class='fa fa-angle-double-right'></i> สรุปผลผลิตการเกษตร</a></li>";

				echo "<li";
				if($subpageName=="ability"){
					echo " class='active'";
				}
				echo "><a href='stat_ability.php'><i class='fa fa-angle-double-right'></i> ศักยภาพในการผลิต</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="report"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-list'></i>";
                echo "<span>สรุปรายงาน</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="amphur"){
					echo " class='active'";
				}
				echo "><a href='rep_amphur.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามอำเภอ</a></li>";

				echo "<li";
				if($subpageName=="tambon"){
					echo " class='active'";
				}
				echo "><a href='rep_tambon.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามตำบล</a></li>";

				echo "<li";
				if($subpageName=="moo"){
					echo " class='active'";
				}
				echo "><a href='rep_moo.php'><i class='fa fa-angle-double-right'></i> เกษตรกรแยกตามหมู่บ้าน</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="tag"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-file'></i>";
                echo "<span>จัดการข้อมูลการขาย</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
            	echo "<li";
				if($subpageName=="gentag"){
					echo " class='active'";
				}
				echo ">";
				echo "<a href='qrmng.php?id_user=".$_SESSION["DUR_USER_ID"]."'><i class='fa fa-angle-double-right'></i> จัดการ QR Code</a>";
				echo "</li>";
            echo "</ul>";
        echo "</li>";
				echo "<li>";
						echo "<a href='signout.php'>";
				echo "<i class='glyphicon glyphicon-log-out'></i>";
									echo "ออกจากระบบ";
							echo "</a>";
				echo "</li>";
	}

//////////////memu for Guest
	if($_SESSION["DUR_USER_STATE"]==""){
		echo "<li ";
		if($pageName=="home"){
			echo "class='active'";
		}
		echo ">";
        	echo "<a href='index.php'>";
            		echo "<i class='fa fa-th'></i> <span>หน้าหลัก</span>";
            echo "</a>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="stat"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-th-large'></i>";
                echo "<span>ระบบสารสนเทศเกษตรกร</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="farmer"){
					echo " class='active'";
				}
				echo "><a href='stat_farmer.php'><i class='fa fa-angle-double-right'></i> สถิติเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="product"){
					echo " class='active'";
				}
				echo "><a href='stat_product.php'><i class='fa fa-angle-double-right'></i> ผลผลิตสับปะรด</a></li>";

				echo "<li";
				if($subpageName=="ability"){
					echo " class='active'";
				}
				echo "><a href='stat_ability.php'><i class='fa fa-angle-double-right'></i> ศักยภาพการผลิต</a></li>";
            echo "</ul>";
        echo "</li>";

		echo "<li class='treeview";
		if($pageName=="search"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-search'></i>";
                echo "<span>ค้นหาข้อมูล</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="searchfamer"){
					echo " class='active'";
				}
				echo "><a href='searchfamer.php'><i class='fa fa-angle-double-right'></i> ค้นหาเกษตรกร</a></li>";
				echo "<li";
				if($subpageName=="searchdetail"){
					echo " class='active'";
				}
				echo "><a href='searchdetail.php'><i class='fa fa-angle-double-right'></i> ค้นหาแบบละเอียด</a></li>";
            echo "</ul>";
        	echo "</li>";

		echo "<li class='treeview";
		if($pageName=="about"){
			echo " active";
		}
		echo "'>";
        	echo "<a href='#'>";
            	echo "<i class='glyphicon glyphicon-globe'></i>";
                echo "<span>เกี่ยวกับระบบ</span>";
                echo "<i class='fa fa-angle-left pull-right'></i>";
            echo "</a>";
            echo "<ul class='treeview-menu'>";
				echo "<li";
				if($subpageName=="system"){
				echo " class='active'";
				}
				echo "><a href='system.php'><i class='fa fa-angle-double-right'></i> รายละเอียดระบบ</a></li>";
				echo "<li";
				if($subpageName=="aboutus"){
					echo " class='active'";
				}
				echo "><a href='aboutus.php'><i class='fa fa-angle-double-right'></i> เกี่ยวกับผู้จัดทำ</a></li>";
            echo "</ul>";
						echo "<li>";
			        	echo "<a href='login.php'>";
						echo "<i class='glyphicon glyphicon-user'></i>";
			                echo "เข้าระบบสมาชิก";
			            echo "</a>";
						echo "</li>";
						echo "<li";
						if($pageName=="register"){
						echo " class='active'";
						}
						echo ">";
			        	echo "<a href='register.php'>";
						echo "<i class='glyphicon glyphicon-check'></i>";
			                echo "ลงทะเบียนสมาชิก";
			            echo "</a>";
						echo "</li>";
	}
?>
