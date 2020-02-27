package com.example2.bhavinpanchani.movieson;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DataBaseHelper extends SQLiteOpenHelper {

    public static final String DATABASE_NAME = "WatchLaterList.db";
    public static final String TABLE_NAME = "WatchLaterList";
    public static final String COL_1 = "ID";
    public static final String COL_2 = "MOVIE_NAME";
    public static final String COL_3 = "USER_NAME";

    // Constructor
    public DataBaseHelper(Context context) {
        super(context, DATABASE_NAME, null, 1);
        SQLiteDatabase db = this.getWritableDatabase();
    }

    // Creates the table
    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL("CREATE TABLE " + TABLE_NAME + " (ID INTEGER PRIMARY KEY AUTOINCREMENT, MOVIE_NAME TEXT, USER_NAME TEXT)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME);
        onCreate(db);
    }

    // Inserts data into the table
    public boolean insertData(String url,String name){
        SQLiteDatabase db = this.getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(COL_2,url);
        contentValues.put(COL_3,name);
        long result = db.insert(TABLE_NAME,null,contentValues);
        if (result == -1){
            return false;
        }
        else {
            return true;
        }
    }

    // Gets the data from the table WHERE the username column is equal to firebaseAuth.getCurrentUser().getEmail()
    public Cursor getData(String userName){
        SQLiteDatabase db = this.getWritableDatabase();
        //Cursor data = db.rawQuery("SELECT MOVIE_NAME FROM " + TABLE_NAME,"USER_NAME = ?",new String[] {userName});
        Cursor data = db.rawQuery("SELECT MOVIE_NAME FROM " + TABLE_NAME + " WHERE USER_NAME = ?", new String[] {userName});
        return data;
    }

    public Integer deleteData(String movieName, String userName){
        SQLiteDatabase db = this.getWritableDatabase();
        return db.delete(TABLE_NAME, "MOVIE_NAME = ? AND USER_NAME = ?", new String[] {movieName,userName});
    }
}
