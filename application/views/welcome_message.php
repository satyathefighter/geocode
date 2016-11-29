<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Zipcode : Get Address</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <style type="text/css">

            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }

            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 19px;
                font-weight: normal;
                margin: 0 0 14px 0;
                padding: 14px 15px 10px 15px;
            }

            code {
                font-family: Consolas, Monaco, Courier New, Courier, monospace;
                font-size: 12px;
                background-color: #f9f9f9;
                border: 1px solid #D0D0D0;
                color: #002166;
                display: block;
                margin: 14px 0 14px 0;
                padding: 12px 10px 12px 10px;
            }

            #body {
                margin: 0 15px 0 15px;
            }

            p.footer {
                text-align: right;
                font-size: 11px;
                border-top: 1px solid #D0D0D0;
                line-height: 32px;
                padding: 0 10px 0 10px;
                margin: 20px 0 0 0;
            }

            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
            .divdata{
                display: inline-block;
                padding: 5px;
                margin: 5px;
                border: 1px solid #efefef;
                box-shadow: 0px 0px 4px #949393;
            }
        </style>
    </head>
    <body>

        <div id="container">
            <h1>Welcome</h1>

            <div id="body">
                <div style="margin-bottom:30px;">
                    <label for="zipcode">Enter Zipcode : </label>
                    <!-- Here i am using onkeyup in place of onkeypress because when use onkeypress it cannot get the current press value -->
                    <input type="text" id="zipcode" name="zipcode" onkeyup="getadd(this.value);" style="width:100%;height:30px;">
                    <!-- <input type="text" id="zipcode" name="zipcode" onkeypress="getadd(this.value);" style="width:100%;height:30px;"> -->
                    <span id="errmsgzip"></span>
                </div>
            </div>
            <div id="body">
                <div style="margin-bottom:30px;" id="setdata">

                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript" charset="utf-8" async defer>
        function getadd(zipcode){
            var zipcode=zipcode.trim();
            if(!isNaN(zipcode)){
                if(zipcode!=''){
                    $.ajax({
                        async: true, // set false if you want to call as synchronous
                        type: "POST",
                        url: "index.php/welcome/getgeo/",
                        data: {zipcode:zipcode},
                        success:function(data){   
                            $("#setdata").html(data);
                        }                            
                    })
                }else{
                    $("#setdata").html('');
                }
            }else{
                $("#errmsgzip").html("Enter Digits Only.").show().fadeOut(3000);
                $("#setdata").html('');
            }
        }	
    </script>
</html>