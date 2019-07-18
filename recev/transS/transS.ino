/* Data terminal of receiver is connected to digital pin 11 of arduino 
uno. Data received will be displayed in the serial monitor*/

#include <VirtualWire.h>
byte message[VW_MAX_MESSAGE_LEN]; // a buffer to store the incoming messages
byte messageLength = VW_MAX_MESSAGE_LEN; // the size of the message
 
void setup()
{
  Serial.begin(9600);
  Serial.println("Receiver is ready");
  // Serial.print(0);
  // Serial.print(",");
    // Serial.print(0);
      //  Serial.print(",");

     //Serial.print(21.95);
       // Serial.print(",");

     //Serial.print(56401);
     //delay(500);
  //Serial.println("temp,humidity,moisture");
  // Initialize the IO and ISR
  vw_setup(2000); // Bits per sec
  vw_rx_start(); // Start the receiver 
}

String str[4];

void loop()
{
  Serial.println();
   Serial.print(0);
   
   Serial.print(",");
     Serial.print(0);
        Serial.print(",");

     Serial.print(21.95);
        Serial.print(",");

     Serial.print(56401);
     delay(1000);
 
  if (vw_get_message(message, &messageLength)) {
   Serial.print("\nReceived: ");
   
     int k=0;
    for (int i = 0; i < messageLength; i++)
    {
      
    //Serial.write(message[i]);     
      if(ispunct(message[i]))
        k++;
      else if(isdigit(message[i]))
        str[k]+=(char)message[i];
      delay(50);
     }
     
  //   Serial.println();
    // Serial.println(str[0]);
     //Serial.println(str[1]);
     //Serial.println(str[2]);
     int num = str[0].toInt();
     int num1 = str[1].toInt();
          int temp = str[2].toInt();
               int mois = str[3].toInt();
     //int mois = str[2].toInt();
     Serial.print(0);
     Serial.print(0);
     Serial.print(21.95);
     Serial.print(56401);
    // delay(500);
      Serial.print(num);
         Serial.print(",");
       Serial.print(num1);
          Serial.print(",");
     Serial.print(temp);
    // Serial.print(",");
    // Serial.print(humid);
     Serial.print(",");
    Serial.println(mois);
     for(int i=0;i<4;i++)
      str[i]="";
     //Serial.println();
    } 
}
 

