<?php

namespace Driesboy;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as TF;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Config;
use pocketmine\network\mcpe\protocol\ContainerSetContentPacket;
use pocketmine\network\mcpe\protocol\SetPlayerGameTypePacket;
use pocketmine\network\mcpe\protocol\AdventureSettingsPacket;
use pocketmine\level\Position;

class Main extends PluginBase implements Listener {


  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    if(!(file_exists($this->getDataFolder()))) {
      @mkdir($this->getDataFolder());
      chdir($this->getDataFolder());
      @mkdir("Players/", 0777, true);
    }
  }

  public function warn(Player $player, Player $sender , $reason){

    $player_name = $player->getName();

    if(!(file_exists($this->getDataFolder() . "Players/" . strtolower($player_name) . ".txt"))) {
      touch($this->getDataFolder() . "Players/" . strtolower($player_name) . ".txt");
      file_put_contents($this->getDataFolder() . "Players/" . strtolower($player_name) . ".txt", "1");
    }else{
      file_put_contents($this->getDataFolder() . "Players/" . strtolower($player_name) . ".txt", $file + 1);
    }
    $file = file_get_contents($this->getDataFolder() . "Players/" . strtolower($player_name) . ".txt");

    if($file === "2") {
      $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"nban " . $player_name . " 1hour " . $reason);

      $sender->sendMessage(TF::GREEN . "" . $player_name . " has been BANNED for 1 hour!");
    }

    if($file >= "3") {
      $this->getServer()->dispatchCommand(new ConsoleCommandSender(),"nban " . $player_name . " 1week " . $reason);

      $sender->sendMessage(TF::GREEN . "" . $player_name . " has been BANNED for 1 week!");
    }else{
      $player->kick(TF::YELLOW . "You are warned for " . $reason . " by a Moderator", false);
      $sender->sendMessage(TF::GREEN . $player_name . " has been warned!");
      return true;
    }
  }

  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
    if(strtolower($cmd->getName()) === "report") {
      if(!(isset($args[0]) and isset($args[1]))) {
        $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /report <player> <reason>");
        return true;
      }else{
        $sender_name = $sender->getName();
        $sender_display_name = $sender->getDisplayName();
        $name = $args[0];
        $player = $this->getServer()->getPlayer($name);
        $pn = $player->getName();
        if($player === null) {
          $sender->sendMessage(TF::RED . "Player " . $pn . " could not be found.");
          return true;
        }else{
          foreach($this->getServer()->getOnlinePlayers() as $p) {
            if($p->hasPermission("rank.moderator")) {
              unset($args[0]);
              $reason = implode(" ", $args);
              $p->sendMessage(TF::YELLOW . $sender_name . " reported " . $pn . " for " . $reason);
            }
          }
          $sender->sendMessage(TF::GREEN . $pn . " has been reported!");
          return true;
        }
      }
    }
    if(strtolower($cmd->getName()) === "warn") {
      if(!(isset($args[0]) and isset($args[1]))) {
        $sender->sendMessage(TF::RED . "Error: not enough args. Usage: /warn <player> <reason>");
        return true;
      } else {
        $sender_name = $sender->getName();
        $name = $args[0];
        $player = $this->getServer()->getPlayer($name);
        if($player === null) {
          $sender->sendMessage(TF::RED . "Player " . $name . " could not be found.");
          return true;
        }else{
          unset($args[0]);
          $reason = implode(" ", $args);
          $this->warn($player, $sender, $reason);
        }
      }
    }
  }
}
