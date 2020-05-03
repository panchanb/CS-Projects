package edu.kean.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.context.SecurityContext;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestParam;

import edu.kean.demo.domain.StockPE;
import edu.kean.demo.service.StockService;

@Controller
public class StockController {
	@Autowired
	private StockService stockService;

	@GetMapping("/pe2growth")
	public String pe2growth(
		@RequestParam(name="ticker", required=true) 
		String ticker, Model model) {
		List<StockPE> stockPEs = stockService.getStockPEs(ticker.toLowerCase());
		model.addAttribute("stockPEs",stockPEs);
		return "analytics";
	}
	
	@GetMapping("/analytics")
    public String analytics(Model model) {
    	SecurityContext context = SecurityContextHolder.getContext();
    	Authentication auth = context.getAuthentication();
    	SimpleGrantedAuthority role = (SimpleGrantedAuthority) (auth.getAuthorities().toArray())[0];
    	List<StockPE> stockPEs = stockService.getAllStocks();
		model.addAttribute("allStocks",stockPEs);
    	if (role.getAuthority().equals("USER"))
    		return "analytics";
    	else
    		return "denied";
    }
	
}
