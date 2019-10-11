<?php

require_once('types/Gamer.php');
require_once('types/Cell.php');

class PiXO {

    const SIDE_X = 'X';
    const SIDE_O = 'O';

    function __construct() {
        // about gamers
        $this->gamers = array(
            new Gamer(1, 'Vasya', $this::SIDE_X),
            new Gamer(23, 'Petya', $this::SIDE_O)
        );
        // about game field
        $this->field = array(
            array(
                new Cell(1, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0))), 
                new Cell(2, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0))), 
                new Cell(3, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0)))
            ),
            array(
                new Cell(4, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0))), 
                new Cell(5, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0))), 
                new Cell(6, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0)))
            ),
            array(
                new Cell(7, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0))), 
                new Cell(8, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0))), 
                new Cell(9, array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0)))
            )
        );
        // about turn
        $this->turn = $this::SIDE_X;
    }

    // по id взять текущего игрока
    private function getGamerById($id) {
        for ($i = 0; $i < count($this->gamers); $i++) {
            if ($this->gamers[$i]->id === $id) {
                return $this->gamers[$i];
            }
        }
        return null;
    }

    // проверяет результат в конкреной Cell
    private function checkCell($r1, $r2) {
        $cell = $this->field[$r1][$r2];
        for($i = 0; $i < 3; $i++) {
            for($j = 0; $j < 3; $j++) {
                $x = 0; $o = 0;
                if($cell->field[$i][$j] == $this::SIDE_X) {
                    $x++;
                } elseif($cell->field[$i][$j] == $this::SIDE_O) {
                    $o++;
                }
                if($x == 3) {
                    return $this::SIDE_X;
                } elseif($o == 3) {
                    return $this::SIDE_O;
                }
            }
        }

        for($j = 0; $j < 3; $j++) {
            for($i = 0; $i < 3; $i++) {
                $x = 0; $o = 0;
                if($cell->field[$i][$j] == $this::SIDE_X) {
                    $x++;
                } elseif($cell->field[$i][$j] == $this::SIDE_O) {
                    $o++;
                }
                if($x == 3) {
                    return $this::SIDE_X;
                } elseif($o == 3) {
                    return $this::SIDE_O;
                }
            }
        }

        for($i = 0; $i < 3; $i++) {
            $x = 0; $o = 0;
            if($cell->field[$i][$i] == $this::SIDE_X) {
                $x++;
            } elseif($cell->field[$i][$i] == $this::SIDE_O) {
                $o++;
            }
            if($x == 3) {
                return $this::SIDE_X;
            } elseif($o == 3) {
                return $this::SIDE_O;
            }
        }

        for($i = 0; $i < 3; $i++) {
            $x = 0; $o = 0;
            if($cell->field[$i][3-$i-1] == $this::SIDE_X) {
                $x++;
            } elseif($cell->field[$i][3-$i-1] == $this::SIDE_O) {
                $o++;
            }
            if($x == 3) {
                return $this::SIDE_X;
            } elseif($o == 3) {
                return $this::SIDE_O;
            }
        }
        return null;
    }

    // проверяет результат всей игры
    public function checkGame($game) {
        for($i = 0; $i <3;$i++) {
            for($j = 0;$j<3;$j++) {
                $x = 0; $o = 0;
                if($game->field[$i][$j]->result == $this::SIDE_X) {
                    $x++;
                } elseif($game->field[$i][$j]->result == $this::SIDE_O) {
                    $o++;
                }
                if($x == 3) {
                    return $this::SIDE_X;
                } elseif($o == 3) {
                    return $this::SIDE_O;
                }
            }
        }

        for($j = 0; $j < 3; $j++) {
            for($i = 0; $i < 3; $i++) {
                $x = 0; $o = 0;
                if($game->field[$i][$j]->result == $this::SIDE_X) {
                    $x++;
                } elseif($game->field[$i][$j]->result == $this::SIDE_O) {
                    $o++;
                }
                if($x == 3) {
                    return $this::SIDE_X;
                } elseif($o == 3) {
                    return $this::SIDE_O;
                }
            }
        }

        for($i = 0; $i < 3; $i++) {
            $x = 0; $o = 0;
            if($game->field[$i][$i]->result == $this::SIDE_X) {
                $x++;
            } elseif($game->field[$i][$i]->result == $this::SIDE_O) {
                $o++;
            }
            if($x == 3) {
                return $this::SIDE_X;
            } elseif($o == 3) {
                return $this::SIDE_O;
            }
        }

        for($i = 0; $i < 3; $i++) {
            $x = 0; $o = 0;
            if($game->field[$i][3-$i-1]->result == $this::SIDE_X) {
                $x++;
            } elseif($game->field[$i][3-$i-1]->result == $this::SIDE_O) {
                $o++;
            }
            if($x == 3) {
                return $this::SIDE_X;
            } elseif($o == 3) {
                return $this::SIDE_O;
            }
        }
        return null;
    }

    // игрок сходил как-то
    public function turn($id, $x, $y) {
        $gamer = $this->getGamerById($id); // по id взять текущего игрока
        if ($gamer) {
            if ($gamer->side == $this->turn) { // проверить, что ход именно его
                // взять по x, y конкретную Cell и её ячейку
                $r1 = ($y-1)/3;
                $r2 = ($x-1)/3;
                $r3 = $y - 3*$r1-1;
                $r4 = $x - 3*$r2-1;
                $randCell = $this->field[$r1][$r2]->field[$r3][$r4];
                // проверить, что она пустая
                if(!$randCell) {
                    // поставить в неё значение стороны игрока
                    $this->field[$r1][$r2]->field[$r3][$r4] = $gamer->side;
                }
                // рассчитать result Cell
                $this->field[$r1][$r2]->result = $this->checkCell($r1,$r2);
                return true; // вернуть true
            }
        }
        return false; // иначе вернуть false
    }
}