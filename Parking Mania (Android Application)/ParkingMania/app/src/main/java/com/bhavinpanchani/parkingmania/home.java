package com.bhavinpanchani.parkingmania;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.FragmentActivity;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.android.material.bottomsheet.BottomSheetBehavior;

public class home extends FragmentActivity implements OnMapReadyCallback, bottomSheet.BottomSheetListener {

    private GoogleMap mMap;
    Button explorebtn;
    String username;
    ImageView searchBtn;
    AlertDialog alertDialog;
    private AutoCompleteTextView allLocationsTextView;


    LatLng Kean, Hazlet, CountrySide, Aurora, Madison, Kansas, Washington, Manhattan, Queens;

    private static final String[] AllLocations = new String[]{
            "Kean University, New Jersey", "Hazlet, New Jersey", "Countryside, Chicago", "Aurora, Illinois", "Madison, Wisconsin", "Kansas City, Missouri",
            "Washington, District of Columbia", "Manhattan, New York", "Queens, New York"
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        allLocationsTextView = findViewById(R.id.allLocationsTextView);

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(
                this,android.R.layout.simple_list_item_1, AllLocations
        );
        allLocationsTextView.setAdapter(adapter);

        searchBtn = findViewById(R.id.searchBtn);

        explorebtn = findViewById(R.id.explore);
        explorebtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                bottomSheet bottomSheet = new bottomSheet();
                bottomSheet.show(getSupportFragmentManager(),"examplebottomsheet");

            }
        });

        Intent intent = getIntent();
        // gets the String from the previous Activity (HomeScreen)
        username = intent.getStringExtra("username");
        System.out.println(username);

    }

    @Override
    public void onMapReady(GoogleMap googleMap) {

        alertDialog = new AlertDialog.Builder(home.this).create();
        alertDialog.setTitle("Sorry");

        mMap = googleMap;
        LatLng UnitedStates = new LatLng(39.7799434,-94.2233417);
        mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(UnitedStates,3f));

        Kean = new LatLng(40.676787, -74.228468);
        mMap.addMarker(new MarkerOptions().position(Kean).title(AllLocations[0]));

        Hazlet = new LatLng(40.4267847,-74.2068244);
        mMap.addMarker(new MarkerOptions().position(Hazlet).title(AllLocations[1]));

        CountrySide = new LatLng(41.7761312,-87.9128269);
        mMap.addMarker(new MarkerOptions().position(CountrySide).title(AllLocations[2]));

        Aurora = new LatLng(41.7585455,-88.3437385);
        mMap.addMarker(new MarkerOptions().position(Aurora).title(AllLocations[3]));

        Madison = new LatLng(43.0851588,-89.5465051);
        mMap.addMarker(new MarkerOptions().position(Madison).title(AllLocations[4]));

        Kansas = new LatLng(39.0921167,-94.8559087);
        mMap.addMarker(new MarkerOptions().position(Kansas).title(AllLocations[5]));

        Washington = new LatLng(38.89378,-77.1546612);
        mMap.addMarker(new MarkerOptions().position(Washington).title(AllLocations[6]));

        Manhattan = new LatLng(40.7754648,-73.990743);
        mMap.addMarker(new MarkerOptions().position(Manhattan).title(AllLocations[7]));

        Queens = new LatLng(40.7114385,-73.8540319);
        mMap.addMarker(new MarkerOptions().position(Queens).title(AllLocations[8]));

        searchBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String locationsString = allLocationsTextView.getText().toString();

                if (locationsString.equalsIgnoreCase(AllLocations[0])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Kean,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[1])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Hazlet,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[2])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(CountrySide,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[3])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Aurora,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[4])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Madison,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[5])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Kansas,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[6])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Washington,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[7])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Manhattan,12f));
                }
                else if(locationsString.equalsIgnoreCase(AllLocations[8])){
                    mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(Queens,12f));
                }
                else{
                    alertDialog.setMessage("We do not have a Parking Garage at " + locationsString +" yet!!");
                    alertDialog.show();
                }

                View view = home.this.getCurrentFocus();
                if(view != null){
                    InputMethodManager imm = (InputMethodManager) getSystemService(Context.INPUT_METHOD_SERVICE);
                    imm.hideSoftInputFromWindow(view.getWindowToken(), 0);
                }
            }
        });

    }

    @Override
    public void onReserveClicked() {
        Intent i = new Intent(home.this,reserve.class);
        i.putExtra("username", username);
        startActivity(i);

    }

    @Override
    public void onViewCancelClicked() {
        Intent i = new Intent(home.this,viewORcancel.class);
        i.putExtra("username", username);
        startActivity(i);
    }

    @Override
    public void onContactusClicked() {
        Intent i = new Intent(home.this,contactus.class);
        i.putExtra("username", username);
        startActivity(i);
    }

    @Override
    public void onLogoutClicked() {
        Intent i = new Intent(home.this,login.class);
        startActivity(i);
        finish();
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        moveTaskToBack(true);
    }
}
