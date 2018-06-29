#include <ESP8266WiFi.h>
#include <WiFiClient.h>
const char ssid[] = "_______"; //Wifi Name ssid   
const char password[]  = "__________"; //password 
String line="";

//Only used if using Static IP
IPAddress ip(192, 168, 0, 6); //IP
IPAddress gatewayDNS(192, 168, 0, 1);//DNS and Gewateway
IPAddress netmask(255, 255, 255,0); //Netmask

//Server IP or domain name
const char* host = "_________________"; //host
//http://<my-local-subnet-host>:80/foo.html
 


// constants
int counter,i,j,b;   //wow it was in sleep mode 
float t1,t2;
boolean wificonnect = false;
char webstring [2];
boolean gtfo =false;
const char* check="z";
int a[5];
// Global variables
WiFiClient client;
 
void setup() {
  
  // Set up serial console to read web page
  Serial.begin(115200);
  Serial.println("************");
  Serial.println("begin");
  // Connect to WiFi
  connectWiFi();
  
   
}
 
void loop() {

   connecthost();
   if(line=="1")
   {
    digitalWrite(D0,HIGH);
    digitalWrite(D1,LOW);
    digitalWrite(D2,LOW);
    digitalWrite(D3,LOW);
   }
   if(line=="2")
   {
    digitalWrite(D0,LOW);
    digitalWrite(D1,HIGH);
    digitalWrite(D2,LOW);
    digitalWrite(D3,LOW);
   }
   if(line=="3")
   {
    digitalWrite(D0,LOW);
    digitalWrite(D1,LOW);
    digitalWrite(D2,HIGH);
    digitalWrite(D3,LOW);
   }
   if(line=="4")
   {
    digitalWrite(D0,LOW);
    digitalWrite(D1,LOW);
    digitalWrite(D2,LOW);
    digitalWrite(D3,HIGH);
   }
   if(line=="5")
   {
    digitalWrite(D0,LOW);
    digitalWrite(D1,LOW);
    digitalWrite(D2,LOW);
    digitalWrite(D3,LOW);
   }
}
 

// Attempt to connect to WiFi
void connectWiFi() {
  Serial.println("Connecting to Wifi");
  WiFi.mode(WIFI_STA);
//  WiFi.config(ip, gateway, subnet); 
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) 
  {
    digitalWrite(D1,HIGH);
    if(counter > 15)
    {
      Serial.println("- can't connect, going to sleep");
       wificonnect = false;    
      // hibernate(failConnectRetryInterval);
    }
    counter++;
  }
  if(WiFi.status() == WL_CONNECTED)
  {
  Serial.print(ssid);  
  Serial.println(" connected");
  wificonnect = true;
  }
  }
void connecthost()
{
  counter=0;
  gtfo=false;
  Serial.print("connecting to ");
  Serial.println(host);
  
  WiFiClient client; //Client to handle TCP Connection
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) { //Connect to server using port httpPort
    Serial.println("connection failed");
    //return;
    digitalWrite(D7,HIGH);}

    String url = "http://jayantbenjamin.000webhostapp.com/henil/view.php"; 
  
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Accept: */*"+"\r\n"+
               "Connection: close\r\n\r\n");
                t1=millis();
          
  unsigned long timeout = millis();
  while (client.available() == 0) 
  {
    if (millis() - timeout > 25000) { //Try to fetch response for 25 seconds
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  
  // Read all the lines of the reply from server and print them to Serial
  counter=0;
  while(client.available())
  {
    
    // String line = client.readStringUntil('\r');
    
    char in1 = client.read();
    line+=in1;
    counter++;
//    led=true;
    //Serial.print(in1);
    }
    //Serial.print(line);
    Serial.println("");
    Serial.println("********************************");
   Serial.print(line);
  Serial.println();
  Serial.println("closing connection");
  client.stop(); //Close Connection
  t2=millis();
  t1=t2-t1;
  Serial.print("Time Taken ");
  Serial.println(t1/1000);
  Serial.print("Total String Length ");
  Serial.println(counter);
  
}


