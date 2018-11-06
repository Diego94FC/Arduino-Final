
#include <SPI.h>
#include <Ethernet.h>
#include <NewPing.h>

#define TRIGGER_PIN  7  // Arduino pin tied to trigger pin on the ultrasonic sensor.
#define ECHO_PIN     3  // Arduino pin tied to echo pin on the ultrasonic sensor.
#define MAX_DISTANCE 100 // Maximum distance we want to ping for (in centimeters). Maximum sensor distance is rated at 400-500cm.
unsigned long times = 0;

int user_time = 3;
int user_distance = 30; //distancia cm entregada por usuario
int myInts[4];

byte mac[] = { 0x70, 0x71, 0xBC, 0x9A, 0x66, 0x7A };
char server[] = "146.83.198.35";    // server de la U

IPAddress ip(192, 168, 1, 61); // IP Arduino

// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):
EthernetClient client;
EthernetClient client2;
NewPing sonar(TRIGGER_PIN, ECHO_PIN, MAX_DISTANCE); // NewPing setup of pins and maximum distance.

void setup() {
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }

  // start the Ethernet connection:
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
  }
  // give  Ethernet shield a second to initialize:
  delay(1000);

}

void loop() {
         
  int distance = sonar.ping_cm(); 
  int temp = 1;
  int i;
   if(distance > 0 && distance < user_distance)
    {
      times++;      
      if(times == (user_time * 100) - 90){

            Serial.print("Tiempo: ");
            Serial.println(user_time);
            Serial.print("Distancia: ");
            Serial.println(user_distance);
       
          Serial.println("connecting...");
          // if you get a connection, report back via serial:
          if (client.connect(server, 80)) {
            Serial.println("connected");
            // Make a HTTP request:
            client.print("GET /~arduinoG4/nuevo.php?tmp=");
            client.print(temp);     
            client.println(" HTTP/1.1");
            client.println("Host: 146.83.198.35");
            client.println("Connection: close");
            client.println();
            Serial.println("Done");
          }
           else {
          // if you didn't get a connection to the server:
          Serial.println("connection failed nuevo.php");
        }

           
        delay(1000);
          int cont = 0;
          int cont2 = 0;
          int flag = 0;
          int i = 0;
          
          while(client.available()) {
             char c = client.read();
             Serial.print(c);
             
             if(c == '#' && flag == 0)          
              flag = 1;

             if(c == '#' && flag == 1 && i > 0)           
             flag = 0;
              
              if(flag == 1) {
              myInts[i] = (byte)c;
                i++;    

              }
              //Serial.print((byte)c);           
             }
           
        client.stop();       
        Serial.println("Client stopped");

        //Nueva wea

          Serial.println("connecting...");
          // if you get a connection, report back via serial:
          if (client2.connect(server, 80)) {
            Serial.println("connected");
            // Make a HTTP request:
            client2.print("GET /~arduinoG4/taller.php?tmp=");
            client2.print(temp);     
            client2.println(" HTTP/1.1");
            client2.println("Host: 146.83.198.35");
            client2.println("Connection: close");
            client2.println();
            Serial.println("Done");
 
 
       
        } else {
          // if you didn't get a connection to the server:
          Serial.println("connection failed");
        }
      client2.stop();       
        Serial.println("Client2 stopped");

        user_distance = myInts[1];
        user_time = myInts[2];
   
       }
    }  

    else {
      times = 0;


    }
  /*
  
  }
  

  // if the server's disconnected, stop the client:
  if (!client.connected()) {
    Serial.println();
    Serial.println("disconnecting.");
    client.stop();

    // do nothing forevermore:
    //while (true);
  }
  */
 delay(10);  

    }
    

