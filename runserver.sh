
# inotifywait -m -r -q --format '%w' bootstrap/ | while read FILE
#do
#  echo "something happened on path $FILE"
#done


lastPID=0

COUNTER=0
while [  $COUNTER -lt 10 ];
do
   let COUNTER=COUNTER+1 
   if (( $lastPID == 0 )) ; then
       echo "not running"
   else
      echo "killing last server"
      kill $lastPID
      lastPID = 0
   fi

    echo "running server"
    nohup php -S 0.0.0.0:80 -t example/ & lastPID = $! & echo $! > phpserver.pid
    echo "lastPID is ${lastPID}";
    
    inotifywait -r -e modify,attrib,close_write,move,create,delete ./example
done


#modify, delete