package edu.kean.demo.service;

import java.util.List;
import edu.kean.demo.domain.StockPE;

public interface StockService {
	public List<StockPE> getStockPEs(String ticker);
	public List<StockPE> getAllStocks();
}
