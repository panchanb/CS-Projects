package com.example2.bhavinpanchani.movieson;

import android.app.ActivityOptions;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.graphics.Color;
import android.os.PersistableBundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.net.NoRouteToHostException;

public class LoginActivity extends AppCompatActivity {

    private TextView movieson;
    private AutoCompleteTextView loginEmail;
    private EditText loginPass;
    private Button loginBtn;
    private Button loginRegBtn;
    private ProgressBar loginProgress;
    private TextView forgotPass;
    private FirebaseAuth firebaseAuth;
    private String loginSuggestion[] = new String[]{"","","","",""};
    private Animation fadein,bounce;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        // Reference to layout.xml file
        movieson = findViewById(R.id.MoviesOn);
        loginEmail = findViewById(R.id.login_email);
        loginPass = findViewById(R.id.login_password);
        loginBtn = findViewById(R.id.login_button);
        loginRegBtn = findViewById(R.id.login_reg_button);
        loginProgress = findViewById(R.id.login_progress);
        forgotPass = findViewById(R.id.forgotpasstext);
        firebaseAuth = FirebaseAuth.getInstance();

        fadein = AnimationUtils.loadAnimation(this,R.anim.fadein);
        bounce = AnimationUtils.loadAnimation(this,R.anim.bounce);

        loginEmail.startAnimation(fadein);
        loginPass.startAnimation(fadein);
        loginRegBtn.startAnimation(fadein);
        forgotPass.startAnimation(fadein);
        loginBtn.startAnimation(bounce);

        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                final String email = loginEmail.getText().toString();
                String password = loginPass.getText().toString();

                // Check if the Email or Password field is empty or not
                if(!TextUtils.isEmpty(email) && !TextUtils.isEmpty(password)){

                    // Progress bar is set to visible
                    loginProgress.setVisibility(View.VISIBLE);

                    // Sign in User with the firebase authentication method
                    firebaseAuth.signInWithEmailAndPassword(email,password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {

                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {

                            if(task.isSuccessful()){

                                // Takes the user to HomeScreen Activity
                                Intent intent = new Intent(LoginActivity.this, HomeScreen.class);
                                startActivity(intent);
                                // finish() doen't let the user to go to previous screen
                                finish();
                            }
                            else{

                                // String e gets gets the exception and shows in the toast
                                String e  = task.getException().getMessage();
                                Toast.makeText(LoginActivity.this, "Error: " + e, Toast.LENGTH_SHORT).show();

                            }
                            // Progress bar is set to invisible
                            loginProgress.setVisibility(View.INVISIBLE);
                        }
                    });
                }
                else{
                    Toast.makeText(LoginActivity.this,"Please enter your email and password", Toast.LENGTH_LONG).show();
                }
            }
        });

        // if "Create new Account" is pressed, this method takes them to Create new account activity
        loginRegBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(LoginActivity.this, CreateNewAccount.class);
                startActivity(intent);
                overridePendingTransition(R.anim.lefttoright,R.anim.righttoleft);
            }
        });

        // Method for "forgot password" button
        forgotPass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // gets the email from the Email field
                String email = loginEmail.getText().toString();

                // If the "forgot password" is pressed, it checks if the email is entered to send the Reset Password Link
                if(!TextUtils.isEmpty(email)) {

                    // Firebase method to send password reset link to provided email
                    firebaseAuth.sendPasswordResetEmail(email);
                    Toast.makeText(LoginActivity.this,"Reset password link has been sent to your email", Toast.LENGTH_LONG).show();

                }

                // Shows a toast to enter email
                else {
                    Toast.makeText(LoginActivity.this, "Please enter your email to continue..", Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();

        loginEmail.setBackgroundColor(Color.TRANSPARENT);
        loginEmail.setTextColor(Color.TRANSPARENT);
        loginEmail.setHintTextColor(Color.TRANSPARENT);
        loginPass.setTextColor(Color.TRANSPARENT);
        loginPass.setBackgroundColor(Color.TRANSPARENT);
        loginPass.setHintTextColor(Color.TRANSPARENT);
        forgotPass.setTextColor(Color.TRANSPARENT);
        loginBtn.setBackgroundColor(Color.TRANSPARENT);
        loginBtn.setTextColor(Color.TRANSPARENT);
        loginRegBtn.setBackgroundColor(Color.TRANSPARENT);
        loginRegBtn.setTextColor(Color.TRANSPARENT);

        Intent homeIntent = new Intent(Intent.ACTION_MAIN);
        homeIntent.addCategory( Intent.CATEGORY_HOME );
        homeIntent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        startActivity(homeIntent);
    }
}
