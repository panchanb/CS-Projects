package com.bhavinpanchani.parkingmania;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class contactus extends AppCompatActivity {

    EditText Fname, Lname, Telephone, Msg;
    String stFname, stLname, stTelephone, stMsg, username;
    Button submitBtn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_contactus);

        Intent intent = getIntent();
        // gets the String from the previous Activity (HomeScreen)
        username = intent.getStringExtra("username");

        Fname = findViewById(R.id.firstNameTxt);
        Lname = findViewById(R.id.LastNameTxt);
        Telephone = findViewById(R.id.telephoneTxt);
        Msg = findViewById(R.id.messageTxt);

        submitBtn = findViewById(R.id.submitBtn);

    }

    public void onSubmit(View view){


        String type = "contactus";
        stFname = Fname.getText().toString();
        stLname = Lname.getText().toString();
        stTelephone = Telephone.getText().toString();
        stMsg = Msg.getText().toString();

        backend backend = new backend(this);
        backend.execute(type, stFname, stLname, stTelephone, stMsg, username);

    }
}
