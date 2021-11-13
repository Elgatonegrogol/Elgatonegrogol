<?php function sendMessage($messaggio) {
  $chatID = '890519078';$token = '1252592847:AAFy5_F2IGeQxXLrNarEimuUp8NPijxJelk';
  $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
  $url = $url . "&text=" . urlencode($messaggio);
  $ch = curl_init();
  $optArray = array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true
  );
  curl_setopt_array($ch, $optArray);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
  }
  sendMessage($yagmail);
