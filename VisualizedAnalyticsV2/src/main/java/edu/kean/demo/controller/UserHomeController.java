package edu.kean.demo.controller;

import org.springframework.security.core.Authentication;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.context.SecurityContext;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

@Controller
public class UserHomeController {

    @GetMapping("/userinfo")
    public String info(Model model) {
		SecurityContext context = SecurityContextHolder.getContext();
		Authentication auth = context.getAuthentication();
		SimpleGrantedAuthority role = 
				(SimpleGrantedAuthority) (auth.getAuthorities().toArray())[0];
		if (role.getAuthority().equals("USER")) {
	    	model.addAttribute("login name", "me");
	    	return "user/userinfo";
		}
		else
			return "denied";
    }
}
