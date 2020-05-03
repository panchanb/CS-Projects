package edu.kean.demo.controller;

import java.util.ArrayList;

import javax.validation.Valid;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PostMapping;

import edu.kean.demo.domain.Role;
import edu.kean.demo.domain.User;
import edu.kean.demo.dto.UserRegistrationDto;
import edu.kean.demo.repository.UserRepository;

@Controller
public class UserRegistrationController {
	@Autowired
	private UserRepository userRepository;
	@Autowired
	BCryptPasswordEncoder passwordEncoder;

	@GetMapping("/registerpage")
	public String registerPage(Model model) {
		model.addAttribute("user", new UserRegistrationDto());
		return "registration";
	}
	
    @PostMapping("/register")
    public String registerUserAccount(@ModelAttribute("user") @Valid UserRegistrationDto userDto, 
    		BindingResult result) {
	    User existing = userRepository.findByEmail(userDto.getEmail());
        if (existing != null) {
            result.rejectValue("email", null, "There is already an account registered with that email");
        }
        if (! userDto.getEmail().equals(userDto.getConfirmEmail())) {
        	result.rejectValue("confirmEmail", null, "Confirmed Email is different from password");
        }
        if (!userDto.getPassword().equals(userDto.getConfirmPassword())) {
        	result.rejectValue("confirmPassword", null, "Confirmed Password is different from password");
        }
        if (!userDto.getTerms()) {
        	result.rejectValue("terms", null, "Terms and conditions must be checked");
        }

        if (result.hasErrors()) {
            return "registration";
        }
		ArrayList<Role> roles = new ArrayList<Role>();
		roles.add(new Role("USER"));
        User newUser = new User(userDto.getFirstName(), userDto.getLastName(), 
        		userDto.getEmail(), passwordEncoder.encode(userDto.getPassword()), roles);
        userRepository.save(newUser);
        return "redirect:/registerpage?success";
    }
}
