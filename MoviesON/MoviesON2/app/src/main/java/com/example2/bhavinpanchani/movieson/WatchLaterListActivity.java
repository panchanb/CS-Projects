package com.example2.bhavinpanchani.movieson;

import android.app.ActivityOptions;
import android.content.Intent;
import android.database.Cursor;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.google.firebase.auth.FirebaseAuth;

import java.util.ArrayList;

public class WatchLaterListActivity extends AppCompatActivity {

    private DataBaseHelper mydb;
    private String[] url1 = new String[28];
    private String name;
    private String url3 = "- Remove from List";
    private int i, j;
    private ListView listView;
    private FirebaseAuth firebaseAuth;

    private static final String[] moviesName = new String[]{
            "Marvel's Daredevil", "Marvel's Luke Cage", "Marvel's Iron Fist", "Marvel's The Punisher", "Marvel's Jessica Jones", "Stranger Things", "Altered Carbon",
            "Marvel's Thor Ragnarok", "The Babysitter", "The Secret Life of Pets", "Meet the Blacks", "The Boss Baby", "Moana", "Trolls",
            "Maniac", "The 100", "Black Lighting", "Black Mirror", "The Walking Dead", "Breaking Bad", "Narcos",
            "The Conjuring", "Apostle", "The Nun", "Insidious", "Little Evil", "Train to Busan", "Annabelle"
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_watch_later_list);

        listView = findViewById(R.id.listview);

        firebaseAuth = FirebaseAuth.getInstance();

        name = firebaseAuth.getInstance().getCurrentUser().getEmail();

        mydb = new DataBaseHelper(this);

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

        getDataFromDataBase();
        ifItemClicked_OpenDescriptionActivity();

    }

    // gets the data from database and puts into the listview
    public void getDataFromDataBase() {

        ArrayList<String> list = new ArrayList<>();

        Cursor data = mydb.getData(name);

        if(data.getCount() == 0){
            Toast.makeText(this, "No movies to show!!", Toast.LENGTH_SHORT).show();
        }
        else{
            while(data.moveToNext()){
                list.add(data.getString(0));
                ListAdapter listAdapter = new ArrayAdapter<>(this,android.R.layout.simple_list_item_1,list);
                listView.setAdapter(listAdapter);
            }
        }
    }

    // Checks with item is selected from list view
    public void ifItemClicked_OpenDescriptionActivity(){

        listView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

            for(i=0; i<=position;){
                if(position == i){
                    //String name = (String)listView.getItemAtPosition(i);
                    for(j=0;j<moviesName.length;) {
                        if (listView.getItemAtPosition(i).equals(moviesName[j])) {
                            intentToDescActivity(url1[j],url3,moviesName[j]);
                        }
                        j++;
                    }
                }
                i++;
            }
            }
        });
    }

    public void intentToDescActivity(String url, String url3, String url2){
        Intent intent = new Intent(WatchLaterListActivity.this,DescriptionActivity.class);
        intent.putExtra("url",url);
        intent.putExtra("url3",url3);
        intent.putExtra("url2", url2);
        startActivityForResult(intent,1);
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();

        Intent i = new Intent(WatchLaterListActivity.this,HomeScreen.class);
        startActivity(i);
        finish();
    }
}
