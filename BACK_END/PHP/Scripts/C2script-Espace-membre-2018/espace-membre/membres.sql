-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 29 Novembre 2018 à 07:54
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

CREATE TABLE `membres` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pseudo` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
