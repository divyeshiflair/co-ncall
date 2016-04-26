
<?php
//header('Content-Type: text/plain');
echo  "\r\n <Client></Client> \r\n \r\n "
 . "<userId>" . $user[0]->user_id . "</userId> \r\n "
 . "<userFirstname>" . $user[0]->user_firstname . "</userFirstname> \r\n "
 . "<userLastname>" . $user[0]->user_lastname . "</userLastname> \r\n "
 . "<userEmail>" . $user[0]->user_email . "</userEmail>  \r\n "
 . "<userMobile>" . $user[0]->user_mobile . "</userMobile>  \r\n "
 . "\r\n <Configuration></Configuration>  \r\n  \r\n "
 . "<conId>" . $configuration[0]->con_id . "</conId> \r\n "
 . "<conGreeting>" . $configuration[0]->con_greeting . "</conGreeting> \r\n "
 . "<conBusiness>" . $configuration[0]->con_business . "</conBusiness> \r\n "
 . "<conBusinessHour>" . $configuration[0]->con_business_hour . "</conBusinessHour> \r\n "
 . "<conAwyMsg>" . $configuration[0]->con_awy_msg . "</conAwyMsg> \r\n "
 . "<conCallbackMsg>" . $configuration[0]->con_callback_msg . "</conCallbackMsg> \r\n "
 . "<conWayToOffice>" . $configuration[0]->con_way_to_office . "</conWayToOffice> \r\n "
 . "<conAdditional>" . $configuration[0]->con_additional . "</conAdditional> \r\n "
 . "<conPhone>" . $configuration[0]->con_contact_phone . "</conPhone> \r\n "
 . "<conFax>" . $configuration[0]->con_contact_fax . "</conFax> \r\n "
 . "<conEmail>" . $configuration[0]->con_contact_email . "</conEmail> \r\n "
 . "<conUrl>" . $configuration[0]->con_contact_url . "</conUrl>"
 . "<conNotificationEmail>" . $configuration[0]->con_notification_email . "</conNotificationEmail> \r\n "
 . "<conNotificationSms>" . $configuration[0]->con_notification_sms . "</conNotificationSms> \r\n "
 . "<conCallofficeNumber>" . $configuration[0]->con_calloffice_number . "</conCallofficeNumber> \r\n "
 . "<conHolidayFrom>" . $configuration[0]->con_holiday_from . "</conHolidayFrom> \r\n "
 . "<conHolidayTo>" . $configuration[0]->con_holiday_to . "</conHolidayTo> \r\n "
 . " \r\n <Payment></Payment> \r\n \r\n"
 . " <payId>" . $payment[0]->pay_id . "</payId> \r\n "
 . "<payBillname>" . $payment[0]->pay_billname . "</payBillname> \r\n "
 . "<payBilladdress1>" . $payment[0]->pay_billaddress1 . "</payBilladdress1> \r\n "
 . "<payBilladdress2>" . $payment[0]->pay_billaddress2 . "</payBilladdress2> \r\n "
 . "<payBilladdress3>" . $payment[0]->pay_billaddress3 . "</payBilladdress3> \r\n "
 . "<payBilladdress4>" . $payment[0]->pay_billaddress4 . "</payBilladdress4> \r\n "
 . "<payStreetNumber>" . $payment[0]->pay_street_number . "</payStreetNumber> \r\n "
 . "<payBillEmail>" . $payment[0]->pay_billemail . "</payBillEmail> \r\n "
 . "<payBankAccount>" . $payment[0]->pay_bankaccount . "</payBankAccount> \r\n "
 . "<payIban>" . $payment[0]->pay_iban . "</payIban> \r\n "
 . "<payBic>" . $payment[0]->pay_bic . "</payBic>"
 . "<payBankname>" . $payment[0]->pay_bankname . "</payBankname> \r\n "
 . "<payLow>" . $payment[0]->pay_low . "</payLow> \r\n "
 . " \r\n <Company></Company> \r\n \r\n"
 . " <comId>" . $company[0]->com_id . "</comId> \r\n "
 . "<comName>" . $company[0]->com_cname . "</comName> \r\n "
 . "<comAdd1>" . $company[0]->com_add1 . "</comAdd1> \r\n "
 . "<comAdd2>" . $company[0]->com_add2 . "</comAdd2> \r\n "
 . "<comAdd3>" . $company[0]->com_add3 . "</comAdd3> \r\n "
 . "<comAdd4>" . $company[0]->com_add4 . "</comAdd4> \r\n "
 . "<comTelephone>" . $company[0]->com_telephone . "</comTelephone> \r\n "
 . "<comFax>" . $company[0]->com_fax . "</comFax> \r\n "
 . "<comEmail>" . $company[0]->com_email . "</comEmail> \r\n "
 . "<comStreetNumber>" . $company[0]->com_street_number . "</comStreetNumber> \r\n ";
 
/*echo "<h2>user</h2>";
echo "<pre>";
print_r($user);
echo "</pre>";
echo "<h2>Configuration</h2>";
echo "<pre>";
print_r($configuration);
echo "</pre>";
echo "<h2>payment</h2>";
echo "<pre>";
print_r($payment);
echo "</pre>";
echo "<h2>company</h2>";
echo "<pre>";
print_r($company);
echo "</pre>";*/
//die();
