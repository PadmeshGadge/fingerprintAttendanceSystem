#include <Adafruit_Fingerprint.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
// Replace with your network credentials
const char* ssid     = "WIFI_SSID";
const char* password = "PASSWORD";

// REPLACE with your Domain name and URL path or IP address with path
const char* serverName = "http://192.168.0.105/sensors/post-data.php";

// Keep this API Key value to be compatible with the PHP code provided in the project page. 
// If you change the apiKeyValue value, the PHP file /post-esp-data.php also needs to have the same key 
String apiKeyValue = "tPmAT5Ab3j7F9";

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  //Check WiFi connection status
  if(Serial.available()){
    int ID = Serial.read();
    Serial.println(ID);
    if(WiFi.status()== WL_CONNECTED){
      HTTPClient http;
      
      // Your Domain name with URL path or IP address with path
      http.begin(serverName);
      
      // Specify content-type header
      http.addHeader("Content-Type", "application/x-www-form-urlencoded");
      
      // Prepare your HTTP POST request data
      String httpRequestData = "api_key=" + apiKeyValue + "&id=" + ID + "";
      Serial.println("httpRequestData: ");
      Serial.println(httpRequestData);
      
      // Send HTTP POST request
      int httpResponseCode = http.POST(httpRequestData);
           
      if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
      }
      else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
      }
      // Free resources
      http.end();
    }
    else {
      Serial.println("WiFi Disconnected");
    }
  }
  //Send an HTTP POST request every 30 seconds
//  delay(30000);  
}
