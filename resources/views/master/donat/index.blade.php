@extends('layouts.main')

@section('content')
	<div class="col-lg-6">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#jenis_donat"> <i class="fa fa-laptop"> Laptops</i></a></li>
                <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-desktop"></i></a></li>
            </ul>
            <div class="tab-content">
                <div id="jenis_donat" class="tab-pane active">
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	
    	$(document).ready(function(){
    		$('ul.nav > li > a').on('click', function(){
    			$('.tab-content > div > div.panel-body').html('<div class="loader"></div>');

    			$.ajax({
    				url : 'donat/data_jenis',
    				type : 'post',
    				dataType : 'json',
    				success : function(data){

    				}
    			});
    		});
    	});

    </script>

@endsection