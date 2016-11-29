@extends('layouts.main')

@section('content')
	<div class="col-md-6">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#panel_donat" id="jenis_donat"> <i class="fa fa-laptop"> Laptops</i></a></li>
                <li class=""><a data-toggle="tab" id="donat"><i class="fa fa-desktop"></i></a></li>
            </ul>
            <div class="tab-content">
                <div id="panel_donat" class="tab-pane active">
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	
    	$(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var init_data = function(){
                $.ajax({
                    url : 'donat/data_jenis',
                    type : 'post',
                    dataType : 'json',
                    success : function(data){
                        $('.tab-content > div > div.panel-body').html(data);
                        initTableJenisDonat();
                    }
                });
            }

            init_data();

            var initTableDonat = function(){
                $.ajax({
                    url : 'donat/get_tabel_data_donat',
                    type : 'post',
                    dataType : 'json',
                    success : function(data){
                        $('#donatContainerTable').html(data);
                    }
                });
            }

            var initTableJenisDonat= function(){
                $.ajax({
                    url : 'donat/get_tabel_data_jenis',
                    type : 'post',
                    dataType : 'json',
                    success : function(data){
                        $('#jenisDonatContainerTable').html(data);
                    }
                });
            }

    		$('ul.nav > li > a#jenis_donat').on('click', function(){
    			$('.tab-content > div > div.panel-body').html('<div class="loader"></div>');

    			$.ajax({
    				url : 'donat/data_jenis',
    				type : 'post',
    				dataType : 'json',
    				success : function(data){
                        $('.tab-content > div > div.panel-body').html(data);
                        initTableJenisDonat();
    				}
    			});
    		});

            $('ul.nav > li > a#donat').on('click', function(){
                $('.tab-content > div > div.panel-body').html('<div class="loader"></div>');

                $.ajax({
                    url : 'donat/data_donat',
                    type : 'post',
                    dataType : 'json',
                    success : function(data){
                        $('.tab-content > div > div.panel-body').html(data);
                        initTableDonat();
                    }
                });
            });
    	});

    </script>

@endsection