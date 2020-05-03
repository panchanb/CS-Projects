package edu.kean.demo.domain;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.validation.constraints.NotNull;

@Entity
public class StockPE {
	
	@Id
	@GeneratedValue
	private Long id;
	
	@NotNull 
	private String company;
	@Column(unique=true, nullable=false)
	private String ticker;
	private int price;
	private double this_year_earning;
	private double next_year_earning;
	private double growth;
	private double pe_to_growth;
	
	public StockPE(){};
	public StockPE(String company, String ticker, int price, 
		double this_year_earning, double next_year_earning, double growth, double pe_to_growth) {
		this.company = company;
		this.ticker = ticker;
		this.price = price;
		this.this_year_earning = this_year_earning;
		this.next_year_earning = next_year_earning;
		this.growth = growth;
		this.pe_to_growth = pe_to_growth;
	}
	public String getCompany() {
		return company;
	}
	public void setCompany(String company) {
		this.company = company;
	}
	public String getTicker() {
		return ticker;
	}
	public void setTicker(String ticker) {
		this.ticker = ticker;
	}
	public int getPrice() {
		return price;
	}
	public void setPrice(int price) {
		this.price = price;
	}
	public double getThis_year_earning() {
		return this_year_earning;
	}
	public void setThis_year_earning(double this_year_earning) {
		this.this_year_earning = this_year_earning;
	}
	public double getNext_year_earning() {
		return next_year_earning;
	}
	public void setNext_year_earning(double next_year_earning) {
		this.next_year_earning = next_year_earning;
	}
	public double getGrowth() {
		return growth;
	}
	public void setGrowth(double growth) {
		this.growth = growth;
	}
	public double getPe_to_growth() {
		return pe_to_growth;
	}
	public void setPe_to_growth(double pe_to_growth) {
		this.pe_to_growth = pe_to_growth;
	}
	public Long getId() {
		return id;
	}
	public void setId(Long id) {
		this.id = id;
	}

}
