@component('mail::message')
# Introduction

Please download your invoice from the attachment bellow.

@component('mail::button', ['url' => ''])
Button Text <?php echo mt_rand(1,10);?>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
