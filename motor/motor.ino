int motor_Pin = 9;
int m = 0;
void setup() {
  // put your setup code here, to run once:
      pinMode(motor_Pin,OUTPUT); 
          Serial.begin(9600);

}

void loop()
{
  // serial read section
  while (Serial.available()) // this will be skipped if no data present, leading to
                             // the code sitting in the delay function below
  {
   
    delay(30);  //delay to allow buffer to fill 
    if (Serial.available() >0)
    { 
      m = 1;
      //char c = Serial.read();  //gets one byte from serial buffer
      //readString += c; //makes the string readString
    }
  }
  if( m==1)
  {
 
  
      digitalWrite(motor_Pin, HIGH);
       //num =0;
         
 }
 else
 {
 digitalWrite(motor_Pin, LOW);
 }
}
