package edu.kean.demo.domain;

import javax.persistence.Embeddable;

@Embeddable
public class Role {
	private String name;
	public Role() {}
	public Role(String name) {
		this.name = name;
	}
	
	public String getName() {
		return name;
	}
	
}
