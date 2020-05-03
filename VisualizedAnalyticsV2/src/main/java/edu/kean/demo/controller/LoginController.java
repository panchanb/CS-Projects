package edu.kean.demo.controller;

import org.springframework.security.core.Authentication;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.context.SecurityContext;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class LoginController {
	
 @GetMapping("/index")
    public String index() {
    	SecurityContext context = SecurityContextHolder.getContext();
    	Authentication auth = context.getAuthentication();
    	SimpleGrantedAuthority role = (SimpleGrantedAuthority) (auth.getAuthorities().toArray())[0];
    	if (role.getAuthority().equals("USER"))
    		return "index";
    	else
    		return "denied";
    }
	
	@GetMapping("/login")
    public String login(Model model) {
        return "login";
    }
    
    @GetMapping("/reset_password")
	public String reset_password(Model model) {
		return "reset_password";
	}
    
    @GetMapping("/userhome")
    public String userHome() {
    	SecurityContext context = SecurityContextHolder.getContext();
    	Authentication auth = context.getAuthentication();
    	SimpleGrantedAuthority role = (SimpleGrantedAuthority) (auth.getAuthorities().toArray())[0];
    	if (role.getAuthority().equals("USER"))
    		return "markets";
    	else
    		return "denied";
    }
    
    @GetMapping("/stocks")
    public String stocks() {
    	SecurityContext context = SecurityContextHolder.getContext();
    	Authentication auth = context.getAuthentication();
    	SimpleGrantedAuthority role = (SimpleGrantedAuthority) (auth.getAuthorities().toArray())[0];
    	if (role.getAuthority().equals("USER"))
    		return "stocks";
    	else
    		return "denied";
    }
    
}
