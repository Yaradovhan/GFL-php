<?php

require_once 'config.php';
require_once 'libs/Band.php';
require_once 'libs/Instrument.php';
require_once 'libs/Musician.php';

$results = array();

$guitar = new Instrument();
$guitar->setName('Guitar');
$guitar->setCategory('String instrument');

$drums = new Instrument();
$drums->setName('Drums');
$drums->setCategory('Percussion');

$bassGuitar = new Instrument();
$bassGuitar->setName('Bass Guitar');
$bassGuitar->setCategory('String instrument');

$piano = new Instrument();
$piano->setName('Piano');
$piano->setCategory('Keyboard');

$synthesiser = new Instrument();
$synthesiser->setName('Synthesiser');
$synthesiser->setCategory('Keyboard');

$vocal = new Instrument();
$vocal->setName('Vocalist');
$vocal->setCategory('Vocal');

$dj = new Instrument();
$dj->setName('DJ');
$dj->setCategory('DJ');

////////////////////////////////////////////////////////////////////////
///                           AC/DC                                  ///
////////////////////////////////////////////////////////////////////////

$acdc = new Band();
$acdc->setName('AC/DC');
$acdc->setGenre('Hard rock group');

$musi = new Musician();
$musi->setName('Angus Young');
$musi->setMusicianType('Musician, songwriter, producer, guitarist');
$musi->addInstrument($guitar);
$musi->assingToBand($acdc);

$musi = new Musician();
$musi->setName('Chis Slade');
$musi->setMusicianType('Drummer');
$musi->addInstrument($drums);
$musi->assingToBand($acdc);

$musi = new Musician();
$musi->setName('Stevie Young');
$musi->setMusicianType('Guitarist');
$musi->addInstrument($guitar);
$musi->addInstrument($vocal);
$musi->assingToBand($acdc);

$musi = new Musician();
$musi->setName('Axl Rose');
$musi->setMusicianType('Singer songwriter record producer musician');
$musi->addInstrument($vocal);
$musi->assingToBand($acdc);

array_push($results, $acdc);

////////////////////////////////////////////////////////////////////////
///                           Queen                                  ///
////////////////////////////////////////////////////////////////////////

$queen = new Band();
$queen->setName('Queen');
$queen->setGenre('Rock group');

$musi = new Musician();
$musi->setName('Brian May');
$musi->setMusicianType('Musician singer songwriter record producer astrophysicist author');
$musi->addInstrument($guitar);
$musi->addInstrument($vocal);
$musi->assingToBand($queen);

$musi = new Musician();
$musi->setName('Roger Taylor');
$musi->setMusicianType('Musician singer-songwriter record producer');
$musi->addInstrument($drums);
$musi->addInstrument($vocal);
$musi->assingToBand($queen);

$musi = new Musician();
$musi->setName('Freddie Mercury');
$musi->setMusicianType('Singer-songwriter record producer');
$musi->addInstrument($piano);
$musi->addInstrument($vocal);
$musi->assingToBand($queen);

$musi = new Musician();
$musi->setName('John Deacon');
$musi->setMusicianType('Musician songwriter');
$musi->addInstrument($guitar);
$musi->addInstrument($bassGuitar);
$musi->addInstrument($synthesiser);
$musi->assingToBand($queen);

array_push($results, $queen);

////////////////////////////////////////////////////////////////////////
///                           Linkin Park                            ///
////////////////////////////////////////////////////////////////////////

$lp = new Band();
$lp->setName('Linkin Park');
$lp->setGenre('Alternative rock');

$musi = new Musician();
$musi->setName('Rob Bourdon');
$musi->setMusicianType('Musician drummer');
$musi->addInstrument($drums);
$musi->assingToBand($lp);

$musi = new Musician();
$musi->setName('Brad Delson');
$musi->setMusicianType('Musician record producer');
$musi->addInstrument($guitar);
$musi->addInstrument($bassGuitar);
$musi->addInstrument($synthesiser);
$musi->assingToBand($lp);

$musi = new Musician();
$musi->setName('Mike Shinoda');
$musi->setMusicianType('Musician singer songwriter rapper record producer graphic designer');
$musi->addInstrument($piano);
$musi->addInstrument($vocal);
$musi->addInstrument($synthesiser);
$musi->addInstrument($guitar);
$musi->assingToBand($lp);

$musi = new Musician();
$musi->setName('Dave Farrell');
$musi->setMusicianType('Musician');
$musi->addInstrument($bassGuitar);
$musi->assingToBand($lp);

$musi = new Musician();
$musi->setName('Joe Hahn');
$musi->setMusicianType('Musician DJ director visual artist');
$musi->addInstrument($synthesiser);
$musi->addInstrument($dj);
$musi->assingToBand($lp);

array_push($results, $lp);

require_once 'template/index.php';