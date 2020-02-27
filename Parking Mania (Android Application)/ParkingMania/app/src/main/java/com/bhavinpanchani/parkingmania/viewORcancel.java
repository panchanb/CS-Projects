package com.bhavinpanchani.parkingmania;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.constraintlayout.widget.ConstraintLayout;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

public class viewORcancel extends AppCompatActivity {

    String stusername, result;
    ListView listView;
    ArrayAdapter<String> adapter;
    Button cancelBtn;
    AlertDialog alertDialog;
    ConstraintLayout constraintLayout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_orcancel);

        constraintLayout = findViewById(R.id.ConstraintLayout);

        Intent intent = getIntent();
        stusername = intent.getStringExtra("username");

        listView = findViewById(R.id.listview);
        cancelBtn = findViewById(R.id.cancelBtn);

        constraintLayout.setVisibility(View.VISIBLE);


        adapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1);
        listView.setAdapter(adapter);

        new getVehicleData().execute(stusername);

    }

    public void onCancelBtn(View view){
//        Intent i = new Intent(viewORcancel.this,home.class);
//        startActivity(i);

        String type = "cancel";
        backend backend = new backend(this);
        backend.execute(type, stusername);

    }


    //Backend for the get vehicle data is done here and not in the backend class..
    class getVehicleData extends AsyncTask<String,String,String>{

        @Override
        protected String doInBackground(String... strings) {

            //String result = "";

            String view_url = "http://eve.kean.edu/~panchanb/ParkingMania/mobile_view_cancel.php";

            try {
                stusername = strings[0];
                URL url = new URL(view_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream = httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String postdata = URLEncoder.encode("stusername","UTF-8")+"="+URLEncoder.encode(stusername,"UTF-8");
                bufferedWriter.write(postdata);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));

                result = "";
                String line = "";

                while ((line = bufferedReader.readLine()) != null){
                    result += line;
                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();

                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }

            return null;
        }

        @Override
        protected void onPostExecute(String result) {
//            super.onPostExecute(s);
            alertDialog = new AlertDialog.Builder(viewORcancel.this).create();
            alertDialog.setTitle("Message:");

            try {
                JSONObject jsonresult = new JSONObject(result);

                int success = jsonresult.getInt("success");

                if (success == 1){
//                    Toast.makeText(viewORcancel.this, "Vehicle data is available", Toast.LENGTH_SHORT).show();
                    JSONArray vehicle_data = jsonresult.getJSONArray("vehicle_data");

                    for (int i = 0; i < vehicle_data.length(); i++){

                        JSONObject vehicle_data2 = vehicle_data.getJSONObject(i);

                        String ParkingNumber = vehicle_data2.getString("ParkingNumber");
                        String Make = vehicle_data2.getString("Make");
                        String Model = vehicle_data2.getString("Model");
                        String OwnerName = vehicle_data2.getString("OwnerName");
                        String LicensePlateNum = vehicle_data2.getString("LicensePlateNum");
                        String OwnerContactNumber = vehicle_data2.getString("OwnerContactNumber");
                        String InTime = vehicle_data2.getString("InTime");
                        String Plan = vehicle_data2.getString("Plan");

                        String Spacing = "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";

                        adapter.add(Spacing + ParkingNumber);
                        adapter.add(Spacing + Plan);
                        adapter.add(Spacing + InTime);
                        adapter.add(Spacing + Make);
                        adapter.add(Spacing + Model);
                        adapter.add(Spacing + LicensePlateNum);
                        adapter.add(Spacing + OwnerName);
                        adapter.add(Spacing + OwnerContactNumber);
                    }
                }
                else {
                    alertDialog.setMessage("You don't have any reservation. Please go to reserve page for reservation");
                    alertDialog.setButton(DialogInterface.BUTTON_POSITIVE, "ok", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialog, int which) {
                            viewORcancel.super.onBackPressed();
                        }
                    });
                    alertDialog.setCancelable(false);
                    alertDialog.show();

                    constraintLayout.setVisibility(View.INVISIBLE);
                }

            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }
}


