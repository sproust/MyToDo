<?php

namespace App\Forms;

use Nette\Application\UI\Form;
use App\Forms\FormFactory;

class AddTaskFormFactory
{

    private $formFactory;

    public function __construct(
        FormFactory $formFactory
    ) {
        $this->formFactory = $formFactory;
    }

    public function create(): Form
    {
        $form = $this->formFactory->create();

        $form->addText("task")
            ->setRequired("Enter task");

        $form->addText("deadline")
            ->setRequired("Enter task deadline");

        $form->addSubmit("send");

        return $form;

    }
}
