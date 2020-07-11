<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ get_text_tpl(get_option('footer_company_name')) }}</title>
</head>
<body>
<h1 style="text-align: center; padding: 20px 10px; background-color: #23527c; color: #FFF;">
	{{ get_text_tpl(get_option('footer_company_name')) }} {{$amount}} PessaCoins added to your account
</h1>
<p>Congratulations!</p>
<p>Your Pessacoin wallet have been funded </p>
<br>
<strong>Name: </strong>  {{$name}}<br><br>
<strong>Email: </strong>  {{$email}}<br><br>
<strong>Amount: </strong>  {{$amount}}<br><br>
<p>
	Do not hesitate to contact our Customer Support team 24/7, if you have any problems.
</p>


<div style="text-align: center; padding: 20px 10px; background-color: #e9e9e9; color: #000000;">
<p>For more information visit our website <a href="http://kazibora.co.ke/">{{ get_text_tpl(get_option('footer_company_name')) }}</a></p>
<p>Send us an email to {{ get_option('site_email_address') }} or call us {{ get_option('site_phone_number') }}</p>
<p>Kind regards</p>
<p>{{ get_text_tpl(get_option('footer_company_name')) }} Support</p>
 <a  href="{{ route('home') }}">
                @if(get_option('logo_settings') == 'show_site_name')
                    {{ get_option('site_name') }}
                @else
                    @if(logo_url())
                        <img src="{{ logo_url() }}">
                    @else
                        {{ get_option('site_name') }}
                    @endif
                @endif

 </a>
</div>
<br>
</body>
</html>