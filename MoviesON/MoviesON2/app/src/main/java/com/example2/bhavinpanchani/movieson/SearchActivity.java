package com.example2.bhavinpanchani.movieson;

import android.app.ActivityOptions;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.graphics.Color;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.ImageView;
import android.widget.SearchView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.google.firebase.auth.FirebaseAuth;

public class SearchActivity extends AppCompatActivity implements View.OnClickListener {

    private static final String[] moviesName = new String[]{
            "Marvel's Daredevil", "Marvel's Luke Cage", "Marvel's Iron Fist", "Marvel's The Punisher", "Marvel's Jessica Jones", "Stranger Things", "Altered Carbon",
            "Marvel's Thor Ragnarok", "The Babysitter", "The Secret Life of Pets", "Meet the Blacks", "The Boss Baby", "Moana", "Trolls",
            "Maniac", "The 100", "Black Lighting", "Black Mirror", "The Walking Dead", "Breaking Bad", "Narcos",
            "The Conjuring", "Apostle", "The Nun", "Insidious", "Little Evil", "Train to Busan", "Annabelle"
    };

    private ImageView searchbtn, searchimage, clearbtn;
    private AutoCompleteTextView ACtextview;
    private String url[] = new String[28];
    private String url1[] = new String[28];
    private Animation Lefttoright, fadeout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);

        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        ACtextview = findViewById(R.id.ACTextView);
        searchbtn = findViewById(R.id.searchbutton);
        searchimage = findViewById(R.id.SearchImage);
        clearbtn = findViewById(R.id.clearbutton);

        Lefttoright = AnimationUtils.loadAnimation(this,R.anim.lefttoright);
        fadeout = AnimationUtils.loadAnimation(this,R.anim.fadeout);

        searchimage.setVisibility(View.INVISIBLE);

        ArrayAdapter<String> adapter = new ArrayAdapter<String>(
                this,android.R.layout.simple_list_item_1, moviesName
        );
        ACtextview.setAdapter(adapter);

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

        url1[0] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%201%20Daredevil.mp4?alt=media&token=22957b39-2f5f-4cb4-b781-8e1fcaf7395b";
        url1[1] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%202%20Luke%20Cage.mp4?alt=media&token=5047843e-e09f-4a37-b694-15d1e1a34414";
        url1[2] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%203%20Iron%20Fist.mp4?alt=media&token=2e322219-ad07-4f90-9bf1-67bf261de0ba";
        url1[3] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%204%20The%20Punisher.mp4?alt=media&token=6682fff5-e66c-48b0-a91d-a2ade8cab6e1";
        url1[4] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%205%20Jessica%20Jones.mp4?alt=media&token=71917ed9-1288-4226-9598-be881536e4ef";
        url1[5] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%206%20Stranger%20Things.mp4?alt=media&token=541d728c-dcef-419c-be68-b1437a54f92e";
        url1[6] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%207%20Altered%20Carbon.mp4?alt=media&token=7f85cdf0-3bc7-486f-af9f-ca245a525fc3";

        url1[7] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%201%20Thor%20Ragnarok.mp4?alt=media&token=71a02853-6506-4007-b99a-ebce916bf34a";
        url1[8] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%202%20The%20Babysitter.mp4?alt=media&token=eb6d3870-c493-4fc9-a933-bb3a335c79e5";
        url1[9] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%203%20The%20Secret%20Life%20of%20Pets.mp4?alt=media&token=92bb0ab3-7e8c-40e1-9ada-92d3da5b6048";
        url1[10] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%204%20Meet%20the%20Blacks.mp4?alt=media&token=b95873f3-5b31-4574-9427-2c9694eff9be";
        url1[11] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%205%20The%20Boss%20Baby.mp4?alt=media&token=044ff2cf-451f-4ec8-85f4-c8843ca4493f";
        url1[12] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%206%20Moana.mp4?alt=media&token=326cf7e4-8f9b-4742-8e16-c77721223654";
        url1[13] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%207%20Trolls.mp4?alt=media&token=c8074ff0-17e5-4e8a-82f1-4af482d27828";

        url1[14] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%201%20Maniac.mp4?alt=media&token=248a813b-eb72-4d32-9600-6f8410eb2c05";
        url1[15] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%202%20The%20100.mp4?alt=media&token=c1e19d40-622c-4e3a-b263-ccf3b230af76";
        url1[16] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%203%20Black%20Lightning.mp4?alt=media&token=7f621656-2646-40de-b9b6-cddab523ffa7";
        url1[17] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%204%20Black%20Mirror.mp4?alt=media&token=4267d05d-20bd-4bda-a413-3f7797b6128d";
        url1[18] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%205%20The%20Walking%20Dead.mp4?alt=media&token=ad5ceb1e-f5cd-40a7-abcc-34eacbf8fad2";
        url1[19] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%206%20Breaking%20Bad.mp4?alt=media&token=93e19432-39e4-4151-a4b4-153b63929a41";
        url1[20] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%207%20Narcos.mp4?alt=media&token=e82c0319-b8af-4282-91c6-b1e6f89c3a43";

        url1[21] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%201%20The%20Conjuring.mp4?alt=media&token=814d4e17-772d-4649-bf87-8238dc5791df";
        url1[22] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%202%20Apostle.mp4?alt=media&token=9a3dbde9-4c2e-45be-b6a0-dc9c97f1d711";
        url1[23] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%203%20The%20Nun.mp4?alt=media&token=6109ee10-36a8-4cdd-b8b4-daaf7d9eda41";
        url1[24] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%204%20Insidious.mp4?alt=media&token=d0aa3ab3-dc2d-4c45-950c-02aa2bb7d33c";
        url1[25] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%205%20Little%20Evil.mp4?alt=media&token=2145a3da-9da9-4233-84fb-43c892364a68";
        url1[26] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%206%20Train%20to%20Busan.mp4?alt=media&token=65d3e570-f4cd-415e-9615-b9edd559377f";
        url1[27] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%207%20Annabelle.mp4?alt=media&token=120ec265-e8e3-4fe2-b6fb-8c41c519f2a3";

        searchbtn.setOnClickListener(this);

        clearbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ACtextview.setText("");
                if(searchimage.getVisibility() == View.VISIBLE){
                    searchimage.startAnimation(fadeout);
                }
                searchimage.setVisibility(View.INVISIBLE);
            }
        });
    }

    public void intenttovview(String url){
        Intent intent = new Intent(SearchActivity.this, VideoViewActivity.class);
        // intent.putExtra("name of new String", "name of the String in this activity")
        intent.putExtra("url", url);
        startActivityForResult(intent, 1);
        finish();
    }

    public void ifClickedStartVideo(final String url){
        searchimage.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                intenttovview(url);
            }
        });
    }

    @Override
    public void onClick(View v) {
        String MovieTyped = ACtextview.getText().toString();
        searchimage.setVisibility(View.VISIBLE);
        boolean found = false;

        for(int i=0; i< moviesName.length;i++) {
            if (MovieTyped.equalsIgnoreCase(moviesName[i]) && searchimage.getVisibility() == View.VISIBLE) {
                Glide.with(getApplicationContext()).load(url[i]).into(searchimage);
                searchimage.startAnimation(Lefttoright);
                ifClickedStartVideo(url1[i]);
                found = true;
            }
        }
        if(!found){
            ACtextview.setText("No Movies Found!! 🙁");
            searchimage.setVisibility(View.INVISIBLE);
        }

        /*if(ACtextview.getText().toString().replaceAll("[^a-zA-Z0-9]", "").toLowerCase().equalsIgnoreCase("marvelsdaredevil")){
            Glide.with(getApplicationContext()).load(url[0]).fitCenter().into(searchimage);
            ifClickedStartVideo(url1[0]);
        }*/
    }

}
