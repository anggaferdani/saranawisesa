<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
 <head>
  <title>{!! $subject !!}</title>
  <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <style type="text/css">a,body,table,td{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}body{height:100%!important;margin:0!important;padding:0!important;width:100%!important}table,td{mso-table-lspace:0;mso-table-rspace:0}img{border:0;line-height:100%;text-decoration:none;-ms-interpolation-mode:bicubic}table{border-collapse:collapse!important}a[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}table{border-collapse:separate}.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}.ExternalClass{width:100%}@media screen and (max-width:525px){.wrapper{width:100%!important;max-width:100%!important}.hide-element{display:none!important}.no-padding{padding:0!important}.img-max{max-width:100%!important;width:100%!important;height:auto!important}.table-max{width:100%!important}.mobile-btn-container{margin:0 auto;width:100%!important}.mobile-btn{padding:15px!important;border:0!important;font-size:16px!important;display:block!important}}@media handheld,all and (device-width:768px) and (device-height:1024px) and (orientation :landscape){.wrapper-ipad{max-width:280px!important}.table-max-ipad{max-width:465px!important}}@media handheld,all and (device-width:768px) and (device-height:1024px) and (orientation :portrait){.wrapper-ipad{max-width:280px!important}.table-max-ipad{max-width:465px!important}}</style>
 </head>
 <body style="margin: 0 !important; padding: 0 !important;">
  <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
   <tr>
    <td align="center">
     <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="wrapper">
      <tr>
       <td align="center" height="25" style="height:25px; font-size: 0;">&nbsp;</td>
      </tr>
      <tr>
       <td align="center">
        <a href="http://www.htmlemailcheck.com" title="Replace with your logo" target="_blank">
         <img src="{{ asset('eproc/img/logo.png') }}" width="100" height="100" alt="Replace with your logo" style="display: block; border:0; width:66px; height:79px;" border="0">
        </a>
       </td>
      </tr>
      <tr>
       <td align="center" height="25" style="height:25px; font-size: 0;">&nbsp;</td>
      </tr>
     </table>
    </td>
   </tr>
   <tr>
    <td bgcolor="#ffffff" align="center" style="padding: 0 10px 0 10px;">
     <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="table-max">
      <tr>
       <td>
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
          <td>
           <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
             <td align="center" height="25" style="height:25px; font-size: 0;">&nbsp;</td>
            </tr>
            <tr>
             <td align="center">
              <h1 style="font-family: Helvetica, Arial, sans-serif; font-size: 28px; font-weight: bold; color: #2C3E50; margin:0; mso-line-height-rule:exactly;">{!! $subject !!}</h1>
             </td>
            </tr>
            <tr>
             <td align="center" height="25" style="height:25px; font-size: 0;">&nbsp;</td>
            </tr>
            <tr>
             <td align="left" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 25px; color: #2C3E50;">
              {!! $body !!}
             </td>
            </tr>
           </table>
          </td>
         </tr>
         <tr>
          <td align="center" height="25" style="height:25px; font-size: 0;">&nbsp;</td>
         </tr>
         <tr>
          <td align="center">
           <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
             <td align="center">
              <table role="presentation" border="0" cellspacing="0" cellpadding="0" class="mobile-btn-container">
               <tr>
                <td align="center" style="border-radius: 25px;" bgcolor="#000000">
                 <a href="{{ $action_link }}" title="Read more" target="_blank" style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; display: inline-block;" class="mobile-btn">Verification</a>
                </td>
               </tr>
              </table>
             </td>
            </tr>
           </table>
          </td>
         </tr>
        </table>
       </td>
      </tr>
     </table>
    </td>
   </tr>
   <tr>
    <td align="center" height="25" style="height:25px; font-size: 0;">&nbsp;</td>
   </tr>
  </table>
 </body>
</html>