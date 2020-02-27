package com.example2.bhavinpanchani.movieson;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.database.Cursor;
import android.graphics.Color;
import android.graphics.ColorFilter;
import android.graphics.drawable.Drawable;
import android.support.annotation.Nullable;
import android.support.constraint.ConstraintLayout;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.DataSource;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.bumptech.glide.load.engine.GlideException;
import com.bumptech.glide.request.RequestListener;
import com.bumptech.glide.request.RequestOptions;
import com.bumptech.glide.request.target.Target;
import com.google.firebase.auth.FirebaseAuth;

import jp.wasabeef.glide.transformations.BlurTransformation;

public class DescriptionActivity extends AppCompatActivity {

    private ImageView BlurImage;
    private TextView DescText, GenreText,Actors,Director,Country, AddtoList, RemoveFromList;
    private Button PlayButton;
    private String url,imageurl,name, removeFromListText, mname;
    private String[] url1 = new String[28];
    private String[] url2 = new String[28];
    private int i =0;
    private Animation fadein;
    private DataBaseHelper mydb;
    private FirebaseAuth firebaseAuth;
    private String m = "- Remove from List";

    private static final String[] moviesName = new String[]{
            "Marvel's Daredevil", "Marvel's Luke Cage", "Marvel's Iron Fist", "Marvel's The Punisher", "Marvel's Jessica Jones", "Stranger Things", "Altered Carbon",
            "Marvel's Thor Ragnarok", "The Babysitter", "The Secret Life of Pets", "Meet the Blacks", "The Boss Baby", "Moana", "Trolls",
            "Maniac", "The 100", "Black Lighting", "Black Mirror", "The Walking Dead", "Breaking Bad", "Narcos",
            "The Conjuring", "Apostle", "The Nun", "Insidious", "Little Evil", "Train to Busan", "Annabelle"
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_description);

        getWindow().setFlags(WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS,WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS);
        this.setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);

        firebaseAuth = FirebaseAuth.getInstance();

        BlurImage = findViewById(R.id.BlurImage);
        DescText = findViewById(R.id.Desc_Text);
        GenreText = findViewById(R.id.genreText);
        PlayButton = findViewById(R.id.PlayMovieButton);
        Actors = findViewById(R.id.actor);
        Director = findViewById(R.id.director);
        Country = findViewById(R.id.country);
        AddtoList = findViewById(R.id.addtolist);
        RemoveFromList = findViewById(R.id.remove_from_list);

        //removeFromListText = "- Remove from List";

        Intent intent = getIntent();
        url = intent.getStringExtra("url");
        imageurl = intent.getStringExtra("url2");
        removeFromListText = intent.getStringExtra("url3");

        RemoveFromList.setVisibility(View.INVISIBLE);
        AddtoList.setVisibility(View.VISIBLE);



        name = firebaseAuth.getInstance().getCurrentUser().getEmail();

        mydb = new DataBaseHelper(this);

        AddToWatchList();

        fadein = AnimationUtils.loadAnimation(this,R.anim.fadein);

        //Glide.with(getApplicationContext()).load(url).apply(new RequestOptions().transform(new BlurTransformation(150))).into(BlurImage);
        //Glide.with(getApplicationContext()).load(url).into(BlurImage);

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


        url2[0] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%201%20Daredevil.mp4?alt=media&token=22957b39-2f5f-4cb4-b781-8e1fcaf7395b";
        url2[1] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%202%20Luke%20Cage.mp4?alt=media&token=5047843e-e09f-4a37-b694-15d1e1a34414";
        url2[2] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%203%20Iron%20Fist.mp4?alt=media&token=2e322219-ad07-4f90-9bf1-67bf261de0ba";
        url2[3] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%204%20The%20Punisher.mp4?alt=media&token=6682fff5-e66c-48b0-a91d-a2ade8cab6e1";
        url2[4] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%205%20Jessica%20Jones.mp4?alt=media&token=71917ed9-1288-4226-9598-be881536e4ef";
        url2[5] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%206%20Stranger%20Things.mp4?alt=media&token=541d728c-dcef-419c-be68-b1437a54f92e";
        url2[6] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Originals%207%20Altered%20Carbon.mp4?alt=media&token=7f85cdf0-3bc7-486f-af9f-ca245a525fc3";

        url2[7] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%201%20Thor%20Ragnarok.mp4?alt=media&token=71a02853-6506-4007-b99a-ebce916bf34a";
        url2[8] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%202%20The%20Babysitter.mp4?alt=media&token=eb6d3870-c493-4fc9-a933-bb3a335c79e5";
        url2[9] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%203%20The%20Secret%20Life%20of%20Pets.mp4?alt=media&token=92bb0ab3-7e8c-40e1-9ada-92d3da5b6048";
        url2[10] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%204%20Meet%20the%20Blacks.mp4?alt=media&token=b95873f3-5b31-4574-9427-2c9694eff9be";
        url2[11] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%205%20The%20Boss%20Baby.mp4?alt=media&token=044ff2cf-451f-4ec8-85f4-c8843ca4493f";
        url2[12] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%206%20Moana.mp4?alt=media&token=326cf7e4-8f9b-4742-8e16-c77721223654";
        url2[13] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Comedy%207%20Trolls.mp4?alt=media&token=c8074ff0-17e5-4e8a-82f1-4af482d27828";

        url2[14] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%201%20Maniac.mp4?alt=media&token=248a813b-eb72-4d32-9600-6f8410eb2c05";
        url2[15] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%202%20The%20100.mp4?alt=media&token=c1e19d40-622c-4e3a-b263-ccf3b230af76";
        url2[16] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%203%20Black%20Lightning.mp4?alt=media&token=7f621656-2646-40de-b9b6-cddab523ffa7";
        url2[17] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%204%20Black%20Mirror.mp4?alt=media&token=4267d05d-20bd-4bda-a413-3f7797b6128d";
        url2[18] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%205%20The%20Walking%20Dead.mp4?alt=media&token=ad5ceb1e-f5cd-40a7-abcc-34eacbf8fad2";
        url2[19] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%206%20Breaking%20Bad.mp4?alt=media&token=93e19432-39e4-4151-a4b4-153b63929a41";
        url2[20] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20TV%207%20Narcos.mp4?alt=media&token=e82c0319-b8af-4282-91c6-b1e6f89c3a43";

        url2[21] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%201%20The%20Conjuring.mp4?alt=media&token=814d4e17-772d-4649-bf87-8238dc5791df";
        url2[22] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%202%20Apostle.mp4?alt=media&token=9a3dbde9-4c2e-45be-b6a0-dc9c97f1d711";
        url2[23] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%203%20The%20Nun.mp4?alt=media&token=6109ee10-36a8-4cdd-b8b4-daaf7d9eda41";
        url2[24] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%204%20Insidious.mp4?alt=media&token=d0aa3ab3-dc2d-4c45-950c-02aa2bb7d33c";
        url2[25] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%205%20Little%20Evil.mp4?alt=media&token=2145a3da-9da9-4233-84fb-43c892364a68";
        url2[26] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%206%20Train%20to%20Busan.mp4?alt=media&token=65d3e570-f4cd-415e-9615-b9edd559377f";
        url2[27] = "https://firebasestorage.googleapis.com/v0/b/movieson2macdatabase.appspot.com/o/Video%20Horror%207%20Annabelle.mp4?alt=media&token=120ec265-e8e3-4fe2-b6fb-8c41c519f2a3";

        //getData();

        for(i=0;i<url1.length;){

            if(url.equals(url1[i])){
                Glide.with(getApplicationContext()).load(url1[i]).into(BlurImage);
                GenreText.startAnimation(fadein);
                DescText.startAnimation(fadein);
                PlayButton.startAnimation(fadein);
                Actors.startAnimation(fadein);
                Director.startAnimation(fadein);
                Country.startAnimation(fadein);

                if(m.equals(removeFromListText)){
                    RemoveFromList.setVisibility(View.VISIBLE);
                    RemoveFromList.startAnimation(fadein);
                    RemoveFromList.setText(removeFromListText);
                    AddtoList.setVisibility(View.INVISIBLE);
                    RemoveFromList.setOnClickListener(new View.OnClickListener() {
                        @Override
                        public void onClick(View v) {
                            //Toast.makeText(DescriptionActivity.this, "You are trying to delete this movie from your list!!", Toast.LENGTH_SHORT).show();

                            Integer DeleteRows = mydb.deleteData(imageurl,name);

                            if(DeleteRows>0){
                                Toast.makeText(DescriptionActivity.this, imageurl + " Deleted..", Toast.LENGTH_SHORT).show();
                                //DescriptionActivity.super.onBackPressed();

                                Intent i = new Intent(DescriptionActivity.this,WatchLaterListActivity.class);
                                startActivity(i);
                                finish();
                            }
                            else{
                                Toast.makeText(DescriptionActivity.this, "Something went wrong, Please try again..", Toast.LENGTH_SHORT).show();
                            }
                        }
                    });
                }

                else{
                    AddtoList.startAnimation(fadein);
                }
            }
            i++;
        }

        PlayButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            for (i=0; i<url1.length;){
                if(url.equals(url1[i])){
                    intenttovview(url2[i]);
                }
                i++;
            }
            }
        });
    }

    // Copies the movies name form HomeScreen activity and puts the value into the Database table
    public void AddToWatchList(){
        AddtoList.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                boolean isInserted = mydb.insertData(imageurl,name);

                if(isInserted){
                    Toast.makeText(DescriptionActivity.this, imageurl + " added to Watch List", Toast.LENGTH_SHORT).show();
                }
                else{
                    Toast.makeText(DescriptionActivity.this, "Something went wrong, Please try again..", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    public void intenttovview(String url){
        Intent intent = new Intent(DescriptionActivity.this, VideoViewActivity.class);
        // intent.putExtra("name of new String", "name of the String in this activity")
        intent.putExtra("url", url);
        startActivityForResult(intent, 1);
    }

    /*public void getData(){
        Cursor data  = mydb.getData(firebaseAuth.getInstance().getCurrentUser().getEmail());
        StringBuffer stringBuffer = new StringBuffer();

        while (data.moveToNext()){
            stringBuffer.append(data.getString(0));
        }
        boolean found = false;
        for (i = 0; i < moviesName.length; ) {

            if (stringBuffer.toString().contains(imageurl) || stringBuffer.toString().contains(mname)) {
                AddtoList.setVisibility(View.INVISIBLE);
                Toast.makeText(this, stringBuffer + " + " + imageurl, Toast.LENGTH_SHORT).show();
                found = true;
            }
            if (!found) {
                AddtoList.setVisibility(View.VISIBLE);
            }
            i++;
        }
    }*/

    @Override
    public void onBackPressed() {
        super.onBackPressed();

        DescText.setTextColor(Color.TRANSPARENT);
        GenreText.setTextColor(Color.TRANSPARENT);
        Actors.setTextColor(Color.TRANSPARENT);
        Director.setTextColor(Color.TRANSPARENT);
        Country.setTextColor(Color.TRANSPARENT);
        AddtoList.setTextColor(Color.TRANSPARENT);
        RemoveFromList.setTextColor(Color.TRANSPARENT);
        PlayButton.setBackgroundColor(Color.TRANSPARENT);
    }
}