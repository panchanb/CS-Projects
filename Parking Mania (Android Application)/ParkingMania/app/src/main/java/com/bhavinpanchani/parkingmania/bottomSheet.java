package com.bhavinpanchani.parkingmania;

import android.content.Context;
import android.content.Intent;
import android.graphics.BlurMaskFilter;
import android.graphics.Color;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.LinearLayout;

import com.google.android.material.bottomsheet.BottomSheetDialogFragment;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

public class bottomSheet extends BottomSheetDialogFragment {

    Button reserve, view_cancel, contact, logout;
    private BottomSheetListener mlistener;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.bottom_sheet_layout, container,false);

        reserve = v.findViewById(R.id.reserveBtn);
        view_cancel = v.findViewById(R.id.viewBtn);
        contact = v.findViewById(R.id.contactBtn);
        logout = v.findViewById(R.id.logout);

        reserve.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mlistener.onReserveClicked();
            }
        });

        view_cancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mlistener.onViewCancelClicked();
            }
        });

        contact.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mlistener.onContactusClicked();
            }
        });

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mlistener.onLogoutClicked();
            }
        });

        return v;

    }

    public interface BottomSheetListener{
        void onReserveClicked();
        void onViewCancelClicked();
        void onContactusClicked();
        void onLogoutClicked();
    }

    @Override
    public void onAttach(Context context) {
        super.onAttach(context);
        try{
            mlistener = (BottomSheetListener) context;
        }
        catch (ClassCastException e){
            throw new ClassCastException(context.toString() + " must implement BottomSheetListener");
        }
    }
}
