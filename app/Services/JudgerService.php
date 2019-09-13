<?php

namespace App\Services;

use App\Entities\Judger;
use App\Exceptions\Judger\JudgerNameExist;
use App\Repositories\JudgerRepository;

class JudgerService
{
    /**
     * @param string $name
     * @param null   $bind_ip
     *
     * @throws \App\Exceptions\Judger\JudgerNameExist
     *
     * @return \App\Entities\Judger
     */
    public function newJudger($name, $bind_ip = null)
    {
        if ($this->exist($name)) {
            throw new JudgerNameExist();
        }
        $judger = new Judger();
        $judger->name = $name;
        $judger->code = new_judge_code();
        $judger->status = Judger::ST_ACTIVITY;
        if ($bind_ip) {
            $judger->bind_ip = $bind_ip;
        }
        $judger->save();

        return $judger;
    }

    private function exist($name)
    {
        return app(JudgerRepository::class)->findBy('name', $name);
    }

    public function find($id)
    {
        return app(JudgerRepository::class)->findOrFail($id);
    }

    /**
     * @param $code
     *
     * @return Judger
     */
    public function getJudger($code)
    {
        if ($code) {
            return app(JudgerRepository::class)->findBy('code', $code);
        }

        return null;
    }
}
