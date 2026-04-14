package com.example.helloworld.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;

import java.util.Arrays;
import java.util.List;

@Controller
public class HelloController {

    @GetMapping("/")
    public String hello(Model model) {
        model.addAttribute("message", "Hello-World");
        return "index";
    }

    @GetMapping("/api/features")
    @ResponseBody
    public List<Feature> getFeatures() {
        return Arrays.asList(
            new Feature("Faculty Module", "Manage professors, assign courses, and track performance.", "👨‍🏫"),
            new Feature("Student Portal", "Track grades, enroll in classes, and view schedules.", "🎓"),
            new Feature("Admin Dashboard", "System-wide settings, user roles, and security checks.", "⚙️")
        );
    }

    static class Feature {
        public String title;
        public String description;
        public String icon;

        public Feature(String title, String description, String icon) {
            this.title = title;
            this.description = description;
            this.icon = icon;
        }
    }
}
