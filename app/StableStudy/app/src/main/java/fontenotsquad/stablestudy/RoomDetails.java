package fontenotsquad.stablestudy;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;

import butterknife.ButterKnife;
import butterknife.InjectView;


public class RoomDetails extends ActionBarActivity {


    private boolean computers;
    private boolean printers;
    private boolean projectors;
    private boolean whiteboards;
    private boolean restricted;
    private String buildingName;
    private int roomNumber;
    private int floor;
    private String classType;
    private String rmSize;



    @InjectView(R.id.detbName) TextView bName;
    @InjectView(R.id.detrNum) TextView rNum;
    @InjectView(R.id.detComputer) TextView comp;
    @InjectView(R.id.detPrinter) TextView print;
    @InjectView(R.id.detProj) TextView proj;
    @InjectView(R.id.detWB) TextView wb;
    @InjectView(R.id.detType) TextView cType;
    @InjectView(R.id.detSize) TextView size;
    @InjectView(R.id.detRestrict) TextView restrict;
    @InjectView(R.id.detFloor) TextView fl;





    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_room_details);
        ButterKnife.inject(this);
        Intent intent = getIntent();
        Bundle bundle = intent.getExtras();
        computers = bundle.getBoolean("computers");
        printers = bundle.getBoolean("printers");
        projectors = bundle.getBoolean("projectors");
        whiteboards = bundle.getBoolean("whiteboards");
        restricted = bundle.getBoolean("restricted");
        buildingName = bundle.getString("bName");
        roomNumber = bundle.getInt("rNum");
        classType = bundle.getString("type");
        rmSize = bundle.getString("size");
        floor = bundle.getInt("floor");

        bName.setText(buildingName);

        if(roomNumber != 0) {
            rNum.setText("Room " + roomNumber);
        }
        else {
            rNum.setText("No Room Number");
        }

        cType.setText("Type: " + classType);
        size.setText("Size: " + rmSize);
        fl.setText("Floor: " + floor);
        


        if (restricted == false) {
            restrict.setText("Restricted: No");
        }
        else {
            restrict.setText("Restricted: Yes");
        }
        if (whiteboards == false) {
            wb.setText("Whiteboards: No");
        }
        else {
            wb.setText("Whiteboards: Yes");
        }
        if (projectors == false) {
            proj.setText("Projectors: No");
        }
        else {
            proj.setText("Projectors: Yes");
        }
        if (printers == false) {
            print.setText("Printers: No");
        }
        else {
            print.setText("Printers: Yes");
        }
        if (computers == false) {
            comp.setText("Computers: No");
        }
        else {
            comp.setText("Computers: Yes");
        }





    }





















//    @Override
//    public boolean onCreateOptionsMenu(Menu menu) {
//        // Inflate the menu; this adds items to the action bar if it is present.
//        getMenuInflater().inflate(R.menu.menu_room_details, menu);
//        return true;
//    }
//
//    @Override
//    public boolean onOptionsItemSelected(MenuItem item) {
//        // Handle action bar item clicks here. The action bar will
//        // automatically handle clicks on the Home/Up button, so long
//        // as you specify a parent activity in AndroidManifest.xml.
//        int id = item.getItemId();
//
//        //noinspection SimplifiableIfStatement
//        if (id == R.id.action_settings) {
//            return true;
//        }
//
//        return super.onOptionsItemSelected(item);
//    }
}
