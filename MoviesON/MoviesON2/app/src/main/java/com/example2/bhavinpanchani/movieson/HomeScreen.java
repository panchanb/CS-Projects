package com.example2.bhavinpanchani.movieson;

import android.app.ActivityOptions;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Handler;
import android.support.constraint.ConstraintLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.HorizontalScrollView;
import android.widget.ImageView;
import android.widget.ScrollView;

import com.bumptech.glide.Glide;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.storage.FirebaseStorage;
import com.google.firebase.storage.StorageReference;

public class HomeScreen extends AppCompatActivity implements View.OnClickListener {

    private FirebaseAuth firebaseAuth;
    private ScrollView scrollView;
    private ImageView[] img = new ImageView[28];
    private String[] url = new String[28];
    private String[] url1 = new String[28];
    private StorageReference storageReference;
    private HorizontalScrollView originalsScrollView, comediesScrollView, tvScrollView, horrorScrollView;
    private ConstraintLayout layout;

    private static final String[] moviesName = new String[]{
            "Marvel's Daredevil", "Marvel's Luke Cage", "Marvel's Iron Fist", "Marvel's The Punisher", "Marvel's Jessica Jones", "Stranger Things", "Altered Carbon",
            "Marvel's Thor Ragnarok", "The Babysitter", "The Secret Life of Pets", "Meet the Blacks", "The Boss Baby", "Moana", "Trolls",
            "Maniac", "The 100", "Black Lighting", "Black Mirror", "The Walking Dead", "Breaking Bad", "Narcos",
            "The Conjuring", "Apostle", "The Nun", "Insidious", "Little Evil", "Train to Busan", "Annabelle"
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home_screen);

        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        VideoViewActivity myv = new VideoViewActivity();

        scrollView = findViewById(R.id.scrollView);
        firebaseAuth = FirebaseAuth.getInstance();

        layout = findViewById(R.id.layout);

        /*AnimationDrawable animDraw = (AnimationDrawable) layout.getBackground();
        animDraw.setEnterFadeDuration(750);
        animDraw.setExitFadeDuration(1500);
        animDraw.start();*/

        originalsScrollView = findViewById(R.id.OriginalsScrollView);
        comediesScrollView = findViewById(R.id.ComdiesScrollView);
        tvScrollView = findViewById(R.id.TVScrollView);
        horrorScrollView = findViewById(R.id.HorrorScrollView);

        // Reference for all Images to the Layout.xml
        img[0] = findViewById(R.id.img1);
        img[1] = findViewById(R.id.image2);
        img[2] = findViewById(R.id.image3);
        img[3] = findViewById(R.id.image4);
        img[4] = findViewById(R.id.image5);
        img[5] = findViewById(R.id.image6);
        img[6] = findViewById(R.id.image7);

        img[7] = findViewById(R.id.image8);
        img[8] = findViewById(R.id.image9);
        img[9] = findViewById(R.id.image10);
        img[10] = findViewById(R.id.image11);
        img[11] = findViewById(R.id.image12);
        img[12] = findViewById(R.id.image13);
        img[13] = findViewById(R.id.image14);

        img[14] = findViewById(R.id.image15);
        img[15] = findViewById(R.id.image16);
        img[16] = findViewById(R.id.image17);
        img[17] = findViewById(R.id.image18);
        img[18] = findViewById(R.id.image19);
        img[19] = findViewById(R.id.image20);
        img[20] = findViewById(R.id.image21);

        img[21] = findViewById(R.id.image22);
        img[22] = findViewById(R.id.image23);
        img[23] = findViewById(R.id.image24);
        img[24] = findViewById(R.id.image25);
        img[25] = findViewById(R.id.image26);
        img[26] = findViewById(R.id.image27);
        img[27] = findViewById(R.id.image28);

        storageReference = FirebaseStorage.getInstance().getReference();

        // String URL for the Images Stored in the Database
        url[0] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Charlie-Cox-Matt-Murdock-Daredevil.JPG?alt=media&token=5b5f346d-6901-4f36-ba84-337766c32082";
        url[1] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/71xby-zAr7L._SY679_.jpg?alt=media&token=d6c75dbc-76d0-48a8-bd3a-4f79e2920a96";
        url[2] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Iron-Fist-Season-2-Poster-Danny-Rand-iron-fist-netflix-41546373-708-1080.jpg?alt=media&token=2c5756e3-568e-488f-a113-d472faa3aca5";
        url[3] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/the_punisher__2017____netflix_poster_2_by_camw1n-dbmlt5i.jpg?alt=media&token=ec03c7eb-1879-4eb6-8236-01fd61c65fc4";
        url[4] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/marvel_s_jessica_jones___poster_i_by_mrsteiners-d9hsoo6.png.jpeg?alt=media&token=ad69097e-d0d5-4309-9b38-e8f0703f4521";
        url[5] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/033cf57372da057f72de6eb02ced064f.jpg?alt=media&token=cb481da1-adcd-4042-8366-e193e91d59c4";
        url[6] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/b77f5fe6185be48452dd0cba6b3e4ece.jpg?alt=media&token=d6cedb27-a612-49a3-ad06-91a503bef05e";

        url[7] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Thor%20Ragnarok%20Comedy.jpg?alt=media&token=baebd70a-14af-488b-b445-ca40826bf265";
        url[8] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/The%20Babysitter%20comedy.jpg?alt=media&token=a141b07d-ef57-47e1-9db8-9adc17998de4";
        url[9] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/The%20secret%20life%20of%20pets%20comedy.jpeg?alt=media&token=15ceaf10-c0be-4455-9023-a3ff58ee2b9a";
        url[10] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Meet%20the%20blacks%20comedy.jpg?alt=media&token=e073c824-c230-4a48-8a42-f7673872f94a";
        url[11] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Boss%20baby%20comedy.jpeg?alt=media&token=d33ef10a-febb-4652-b903-edac410220cc";
        url[12] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Disney%20Moana%20comedy.jpg?alt=media&token=0c3ee0b2-2ddd-4e79-b32e-8282605d03f3";
        url[13] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Trolls%20comedy.jpg?alt=media&token=180cad01-96e6-4ca2-b2ae-af54074de856";

        url[14] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/1%20Maniac%20tv.jpg?alt=media&token=d5397c53-837f-47a0-a433-023417902718";
        url[15] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/2%20the%20100%20tv.jpg?alt=media&token=58d58871-8999-4d6c-8184-022da583f68d";
        url[16] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/3%20black%20lighting%20tv.png?alt=media&token=ed7c0019-90d1-4fc7-9c2e-ece49059bfdc";
        url[17] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/4%20black%20mirror%20tv.jpg?alt=media&token=745506a4-f0a9-4565-925a-8e1c5662dd22";
        url[18] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/5%20the%20walking%20dead%20tv.jpg?alt=media&token=4680b1d5-1342-4bd0-b9cf-ddf80ca39138";
        url[19] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/6%20breaking%20bad%20tv.jpg?alt=media&token=d71c448d-6cf0-42ee-ab91-5c22256b34ad";
        url[20] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/7%20narcos%20tv.jpg?alt=media&token=e3f338fc-5537-47a5-9bae-221bff19b78a";

        url[21] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%201%20the%20conjuring.jpg?alt=media&token=91e90e86-2e28-492d-a279-f0f9742efd37";
        url[22] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%202%20apostle.jpg?alt=media&token=d4f28a5c-ee0a-4bdc-9f1f-d482434d4d16";
        url[23] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%203%20the%20nun.jpg?alt=media&token=1d1a92ec-9ded-4491-b36b-f45a5172705e";
        url[24] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%204%20insidious.jpg?alt=media&token=368fa4b9-19da-4581-94ca-fe6add2a72fb";
        url[25] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%205%20little%20evil.jpeg?alt=media&token=385855ee-0116-4c23-8870-230a76142bb9";
        url[26] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%206%20train%20to%20busan.jpg?alt=media&token=85a97b26-c0c4-48c7-bca7-9fa269f5bc70";
        url[27] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%207%20annabelle.jpg?alt=media&token=c995071f-5a84-4f50-b7c2-44a7a6ded5eb";

        url1[0] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%201%20blur%20Daredevil.jpg?alt=media&token=ff0ddccb-e79c-4a3d-9c85-43eda1a90503";
        url1[1] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%202%20blur%20Luke%20Cage.jpg?alt=media&token=babaac08-596b-43d1-a770-edfbbf3b73af";
        url1[2] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%203%20blur%20Iron%20Fist.jpg?alt=media&token=ee6ebdbf-764a-44d7-8b5a-67acdd2962c5";
        url1[3] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%204%20blur%20The%20Punisher.jpg?alt=media&token=3d2dda68-2d60-44dd-b6af-2be15c38ce84";
        url1[4] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%205%20blur%20Jessica%20Jones.jpg?alt=media&token=f9565556-8c21-485a-a2c2-cd2a02001307";
        url1[5] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%206%20blur%20Stranger%20Things.jpg?alt=media&token=7cede883-46bd-45ee-8520-2eb28f3a2e89";
        url1[6] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/MoviesON%207%20blur%20Altered%20Carbon.jpg?alt=media&token=a3bdccc2-50ca-47e4-a289-fe0da1c7cc1f";

        url1[7] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%201%20blur%20Thor%20Ragnarok.jpg?alt=media&token=05dac251-96a0-434a-81ae-d49805e82333";
        url1[8] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%202%20blur%20The%20Babysitter.jpg?alt=media&token=1b3ef2c2-39d5-4c6d-91e2-e7099e84b2a7";
        url1[9] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%203%20blur%20The%20secret%20life%20of%20pets.jpg?alt=media&token=5ab9de03-58d7-4fb1-ab4e-9654e58c2f0e";
        url1[10] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%204%20blur%20Meet%20the%20blacks.jpg?alt=media&token=a97d1f5f-9a27-49fa-9a7b-0be794b9b9b5";
        url1[11] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%205%20blur%20Boss%20baby.jpg?alt=media&token=9dc433eb-7c13-4878-9bf1-e1cb2197385e";
        url1[12] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%206%20blur%20Disney%20Moana.jpg?alt=media&token=fc03ecc3-3807-48f5-a475-80d283cac51a";
        url1[13] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Comedy%207%20blur%20Trolls.jpg?alt=media&token=71dc0654-52c7-410a-9368-03b46c312b54";

        url1[14] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%201%20blur%20Maniac.jpg?alt=media&token=a743fe0a-6904-4f24-b5e2-ce55c88ebefb";
        url1[15] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%202%20blur%20the%20100.jpg?alt=media&token=8ddd2250-1ef8-4f14-a500-e309620cb8be";
        url1[16] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%203%20blur%20black%20lighting.jpg?alt=media&token=5c3be71a-5d3f-41d1-84a1-ad67a0594ee8";
        url1[17] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%204%20blur%20black%20mirror.jpg?alt=media&token=9d73c4df-6bb0-4809-bf99-de31276fd7a5";
        url1[18] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%205%20blur%20the%20walking%20dead.jpg?alt=media&token=b1ecf1de-10da-4020-8522-31e372474ab5";
        url1[19] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%206%20blur%20breaking%20bad.jpg?alt=media&token=65d6954a-9e5b-4166-b2bf-fd4718375931";
        url1[20] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/TV%207%20blur%20narcos.jpg?alt=media&token=d716a571-0c7a-4195-ae1b-18e8b999e74c";

        url1[21] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%201%20blur%20the%20conjuring.jpg?alt=media&token=0f6619c9-3eb9-4993-9ce0-03cf573e931e";
        url1[22] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%202%20blur%20apostle.jpg?alt=media&token=61e88978-cc6f-4e49-a344-07d3fc594852";
        url1[23] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%203%20blur%20the%20nun.jpg?alt=media&token=10befc47-e685-4dba-b8de-4c964439a696";
        url1[24] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%204%20blur%20insidious.jpg?alt=media&token=a0c0212e-779c-4d4e-b617-c29c2a825e11";
        url1[25] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%205%20blur%20little%20evil.jpg?alt=media&token=d4a6f071-a537-404f-8c17-6bfb9b70d698";
        url1[26] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%206%20blur%20train%20to%20busan.jpg?alt=media&token=b7572151-8021-4acb-aeab-c7c87051890d";
        url1[27] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/horror%207%20blur%20annabelle.jpg?alt=media&token=f9174c9c-554a-4b1f-8c8f-1e05a961970c";

        // Using the String URL, It gets Images from Database and pastes into the corresponding ImageView
        for(int i=0; i < url.length;){
            Glide.with(getApplicationContext()).load(url[i]).into(img[i]);
            img[i].setOnClickListener(this);
            i++;
        }
        ShowScrollAnimation();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        switch(item.getItemId()){

            case R.id.search:
                Intent intent = new Intent(HomeScreen.this, SearchActivity.class);
                startActivity(intent);
                break;

            case R.id.WatchLaterList:
                Intent intent2 = new Intent (HomeScreen.this,WatchLaterListActivity.class);
                startActivity(intent2);
                break;

            case R.id.logout:
                firebaseAuth.signOut();
                Intent intent3 = new Intent(HomeScreen.this, LoginActivity.class);
                startActivity(intent3);
                finish();
                break;
        }
        return super.onOptionsItemSelected(item);
    }

    // This onClick method checks which image is clicked and using the URL provided it calls the IntentToDescActivty
    @Override
    public void onClick(View v) {

        for(int i=0;i<img.length;){
            if(v==img[i]){
                intentToDescActivity(url1[i],moviesName[i],img[i]);
            }
            i++;
        }
    }

    public void ShowScrollAnimation(){
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                originalsScrollView.smoothScrollBy(150,0);
            }
        },2000);
        new Handler().postDelayed(new Runnable() {
            @Override
            public void run() {
                originalsScrollView.smoothScrollBy(-150,0);
            }
        },2500);
    }

    public void intentToDescActivity(String url,String url2, ImageView img){
        Intent intent = new Intent(HomeScreen.this,DescriptionActivity.class);
        intent.putExtra("url",url);
        intent.putExtra("url2",url2);
        ActivityOptions options = ActivityOptions.makeSceneTransitionAnimation(HomeScreen.this,img,"anim");
        //startActivity(intent2,options.toBundle());
        startActivityForResult(intent,1,options.toBundle());
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();

        Intent homeIntent = new Intent(Intent.ACTION_MAIN);
        homeIntent.addCategory( Intent.CATEGORY_HOME );
        homeIntent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
        startActivity(homeIntent);
    }
}
