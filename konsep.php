function check_available_date(startDate, endDate, bookedDate) {
  if (endDate < startDate){ return false;

  if (startDate >= bookedDate.startDate) {
    if (startDate <= bookedDate.endDate) return false;
    return true;
  }

  if (endDate >= bookedDate.startDate) return false;

  return true;
}

startDate = 10;
endDate = 15;

bookedDate = { startDate: 5, endDate: 13 };

 2      9
IIIIXIIIIIIIXIIIII
 2 4
            4   7
        9      6

  3            6
1234567890123456789


ambilBookedDate = [
{ startDate, endDate }
];
boleh = true;
for each booked Date \
  check_available_date()

  if (false) {
     boleh = false;
  }

if !boleh alert
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>
