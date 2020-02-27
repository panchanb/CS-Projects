package com.example2.bhavinpanchani.movieson;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

public class CreateNewAccount extends AppCompatActivity {

    private EditText RegisterEmail;
    private EditText RegisterPass;
    private EditText RegisterConfirmPass;
    private Button RegisterBtn;
    private ProgressBar registerProgress;
    private FirebaseAuth firebaseAuth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_create_new_account);

        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        // Reference to layout.xml file
        RegisterEmail = findViewById(R.id.Register_email);
        RegisterPass = findViewById(R.id.Register_password);
        RegisterBtn = findViewById(R.id.Register_button);
        registerProgress = findViewById(R.id.register_progress);
        RegisterConfirmPass = findViewById(R.id.register_con_pass);
        firebaseAuth = FirebaseAuth.getInstance();

        // Register User if the Register button is pressed
        RegisterBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // gets the email, password, and confirm password text from the corresponding fields
                String email = RegisterEmail.getText().toString();
                String password = RegisterPass.getText().toString();
                String confirmPassword = RegisterConfirmPass.getText().toString();

                // Check if the email, password and confirm password field is empty or not
                if (!TextUtils.isEmpty(email) && !TextUtils.isEmpty(password) && !TextUtils.isEmpty(confirmPassword)) {

                    // check if the text from password and confirm password field are equal or not
                    if(password.matches(confirmPassword)) {

                        registerProgress.setVisibility(View.VISIBLE);

                        // Register user with firebase authentication method
                        firebaseAuth.createUserWithEmailAndPassword(email, password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                            @Override
                            public void onComplete(@NonNull Task<AuthResult> task) {

                                if (task.isSuccessful()) {

                                    Intent intent = new Intent(CreateNewAccount.this, HomeScreen.class);
                                    startActivity(intent);
                                    finish();

                                } else {

                                    String e = task.getException().getMessage();
                                    Toast.makeText(CreateNewAccount.this, "Error: " + e, Toast.LENGTH_LONG).show();

                                }

                                registerProgress.setVisibility(View.INVISIBLE);

                            }
                        });
                    }
                    else {
                        Toast.makeText(CreateNewAccount.this,"Password doesn't match!! Please try again..", Toast.LENGTH_LONG).show();
                    }
                }
                else{
                    Toast.makeText(CreateNewAccount.this,"Please fill up all the fields..", Toast.LENGTH_LONG).show();
                }
            }
        });
    }
}
